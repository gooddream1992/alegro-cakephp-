<?php

namespace MasoodRehman\Travelport;


use MasoodRehman\Travelport\Request\AirLowFareSearchRequest;
use MasoodRehman\Travelport\Response\AirLowFareSearchResponse;
use MasoodRehman\Travelport\Service\SoapService;


/**
*  Main class
*
*  @author MasoodRehman
*  @email  masoodurrehman42@gmail.com
*/
class Flight extends SoapService
{
    public function AirLowFareSearchReq($payload = null)
    {
        $request = new AirLowFareSearchRequest();
        $response = $request->validate($payload);
        if (empty($response)) {
            $requestPayload = $request->getRequestPayload($payload);
            $response = $this->callSerivce('AirLowFareSearchReq', $requestPayload);
            $responsePayload = new AirLowFareSearchResponse();
            $response = $responsePayload->parse($response);
        }

        return $response;
    }
}