<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 6/20/2019
 * Time: 12:38 PM
 */

namespace MasoodRehman\Travelport\Response;


use MasoodRehman\Travelport\Util\Helper;

class AirLowFareSearchResponse
{
    public $ResponseStatus;
    public $ResponseMessage;
    public $ResponseData = array();

    public function __construct()
    {
        $this->ResponseStatus = 'Success';
        $this->ResponseMessage = '';
    }

    public function parse($response)
    {
        if (isset($response->ResponseMessage) && ! empty($response->ResponseMessage)) {
            $this->ResponseMessage = $response->ResponseMessage;
        }

        if (is_object($response->AirPricePointList->AirPricePoint)) {
            $response->AirPricePointList->AirPricePoint = array($response->AirPricePointList->AirPricePoint);
        }
        foreach ($response->AirPricePointList->AirPricePoint as $AirPricePoint) {
            // Split price string of AirPricingInfo.
            $AirPricePoint->AirPricingInfo->TotalPrice = Helper::splitPrice($AirPricePoint->AirPricingInfo->TotalPrice);
            $AirPricePoint->AirPricingInfo->BasePrice = Helper::splitPrice($AirPricePoint->AirPricingInfo->BasePrice);
            $AirPricePoint->AirPricingInfo->ApproximateTotalPrice = Helper::splitPrice($AirPricePoint->AirPricingInfo->ApproximateTotalPrice);
            $AirPricePoint->AirPricingInfo->ApproximateBasePrice = Helper::splitPrice($AirPricePoint->AirPricingInfo->ApproximateBasePrice);
            $AirPricePoint->AirPricingInfo->Taxes = Helper::splitPrice($AirPricePoint->AirPricingInfo->Taxes);

            // FlightOption
            if (is_object($AirPricePoint->AirPricingInfo->FlightOptionsList->FlightOption)) {
                // Single option.
                $AirPricePoint->AirPricingInfo->FlightOptionsList->FlightOption = array($AirPricePoint->AirPricingInfo->FlightOptionsList->FlightOption);
            }
            foreach ($AirPricePoint->AirPricingInfo->FlightOptionsList->FlightOption as $FlightOption) {
                // Delete keys.
                unset($FlightOption->LegRef);
                unset($FlightOption->Origin);
                unset($FlightOption->Destination);

                if (is_object($FlightOption->Option)) {
                    // Single option.
                    $FlightOption->Option = array($FlightOption->Option);
                }
                foreach ($FlightOption->Option as &$Option) {
                    // Delete keys.
                    unset($Option->Key);
                    unset($Option->TravelTime);

                    if (is_object($Option->BookingInfo)) {
                        // Direct flight.
                        $Option->BookingInfo = array($Option->BookingInfo);
                    }
                    foreach ($Option->BookingInfo as $BookingInfo) {
                        // FlightDetailsRef & SegmentRef
                        if (is_object($response->AirSegmentList->AirSegment)) {
                            $response->AirSegmentList->AirSegment = array($response->AirSegmentList->AirSegment);
                        }
                        foreach ($response->AirSegmentList->AirSegment as $AirSegment) {
                            if ($AirSegment->Key == $BookingInfo->SegmentRef) {
                                if (is_object($response->FlightDetailsList->FlightDetails)) {
                                    $response->FlightDetailsList->FlightDetails = array($response->FlightDetailsList->FlightDetails);
                                }
                                foreach ($response->FlightDetailsList->FlightDetails as $FlightDetails) {
                                    if (is_object($AirSegment->FlightDetailsRef)) {
                                        // FlightDetailsRef Object
                                        if ($AirSegment->FlightDetailsRef->Key == $FlightDetails->Key) {
                                            $AirSegment->FlightDetailsRef = $FlightDetails;
                                            $BookingInfo->SegmentRef = $AirSegment;
                                        }
                                    } else {
                                        // FlightDetailsRef Array
                                        foreach ($AirSegment->FlightDetailsRef as $FlightDetailsRefIndex => $FlightDetailsRef) {
                                            if ($FlightDetailsRef->Key == $FlightDetails->Key) {
                                                $AirSegment->FlightDetailsRef[$FlightDetailsRefIndex] = $FlightDetails;
                                                $BookingInfo->SegmentRef = $AirSegment;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        // FareInfoRef
                        if (is_object($response->FareInfoList->FareInfo)) {
                            $response->FareInfoList->FareInfo = array($response->FareInfoList->FareInfo);
                        }
                        foreach ($response->FareInfoList->FareInfo as $FareInfo) {
                            if ($BookingInfo->FareInfoRef == $FareInfo->Key) {
                                $BookingInfo->FareInfoRef = $FareInfo;
                            }
                        }
                    }
                }
            }

            unset($AirPricePoint->AirPricingInfo->FareInfoRef);

            array_push($this->ResponseData, $AirPricePoint->AirPricingInfo);
        }

        return $this;
    }
}