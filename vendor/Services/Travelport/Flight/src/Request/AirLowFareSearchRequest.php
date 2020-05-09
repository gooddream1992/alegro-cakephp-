<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 6/19/2019
 * Time: 10:32 PM
 */

namespace MasoodRehman\Travelport\Request;


use MasoodRehman\Travelport\Config;

class AirLowFareSearchRequest
{
    public function __construct()
    {
        $this->config = new Config();
    }

    public function validate($payload)
    {
        if (! isset($payload['DepartureDate'])) {
            return array(
                'status' => 'error',
                'error' => 'DepartureDate is required.'
            );
        } else if (strtotime($payload['DepartureDate']) < strtotime(date('Y-m-d'))) {
            return array(
                'status' => 'error',
                'error' => 'Preferred date-time is before the current departure city date-time.'
            );
        } else if (! isset($payload['Origin'])) {
            return array(
                'status' => 'error',
                'error' => 'Origin is required.'
            );
        } else if (! isset($payload['Destination'])) {
            return array(
                'status' => 'error',
                'error' => 'Destination is required.'
            );
        } else if (! isset($payload['SearchPassenger'])) {
            return array(
                'status' => 'error',
                'error' => 'SearchPassenger is required.'
            );
        } else if (! isset($payload['TripType'])) {
            return array(
                'status' => 'error',
                'error' => 'TripType (oneway, round) is required.'
            );
        }

        return NULL;
    }

    public function getRequestPayload($payload)
    {
        $DepartureTime = (isset($payload['DepartureTime'])) ? $payload['DepartureTime']: '';
        $DepartureDateTime = $payload['DepartureDate'].' '.$DepartureTime;
        $DepartureTime = date_format(date_create($DepartureDateTime), 'c');
        $ArrivalTime = (isset($payload['ArrivalTime'])) ? $payload['ArrivalTime']: '';
        $ArrivalDateTime = $payload['ArrivalDate'].' '.$ArrivalTime;
        $ArrivalTime = date_format(date_create($ArrivalDateTime), 'c');

        $parameters['AuthorizedBy'] = 'Travelport';
        $parameters['TargetBranch'] = $this->config->item('API_BRANCH_CODE');
        $parameters['BillingPointOfSaleInfo']['OriginApplication'] = 'UAPI';

        // AirPricingModifiers
        $parameters['AirPricingModifiers']['CurrencyType'] = "USD";
        if (isset($payload['Currency']) && ! empty($payload['Currency'])) {
            $parameters['AirPricingModifiers']['CurrencyType'] = $payload['Currency'];
        }
        /**
         * Indicates whether only public fares should be returned or specific type of private fares.
         *
         * PublicFaresOnly ,
         * PrivateFaresOnly ,
         * AgencyPrivateFaresOnly ,
         * AirlinePrivateFaresOnly ,
         * PublicAndPrivateFares ,
         * NetFaresOnly ,
         * AllFares
         */
        if (isset($payload['FaresIndicator']) && ! empty($payload['FaresIndicator'])) {
            $parameters['AirPricingModifiers']['FaresIndicator'] = $payload['FaresIndicator'];
        }

        // AirSearchModifiers
        $parameters['AirSearchModifiers']['PreferredProviders']['Provider']['Code'] = $this->config->item('PROVIDER');
        // Cabin Class
        if (isset($payload['CabinClass']) && ! empty($payload['CabinClass'])) {
            $parameters['AirSearchModifiers']['PreferredCabins']['CabinClass']['Type'] = $payload['CabinClass'];
        }

        // SearchAirLeg
        $parameters['SearchAirLeg'] = array();
        $SearchAirLeg['SearchOrigin']['CityOrAirport']['Code'] = $payload['Origin'];
        $SearchAirLeg['SearchOrigin']['CityOrAirport']['PreferCity'] = 'true';
        $SearchAirLeg['SearchDestination']['CityOrAirport']['Code'] = $payload['Destination'];
        $SearchAirLeg['SearchDestination']['CityOrAirport']['PreferCity'] = 'true';
//        $SearchAirLeg['SearchDepTime']['Time'] = $DepartureTime; // Strict to this time.
        $SearchAirLeg['SearchDepTime']['PreferredTime'] = $DepartureTime; // Good to use PreferredTime

        // AirLegModifiers
        if (isset($payload['AirLegModifiers']) && ! empty($payload['AirLegModifiers']))
        {
            /**
             * AnchorFlightData
             *
             * Specifies exactly which flights (Airline code, flight number, date, origin, and destination) should be returned in the response.
             * Anchor flight(s) may be applied anywhere in the shop request and multiple anchor flights may be submitted.
             * This enhancement applies only to Worldspan (1P) and Axess (1J) in Air v33.0 and greater.
             * Include SearchAirLeg/AirLegModifiers/AnchorFlightData @AirlineCode and @FlightNumber. Set @ConnectionIndicator="true" to search for a connected flight.
             *
             * Payload:
             * array(
                'AirlineCode' => 'EK', // Indicates Anchor flight carrier code
                'FlightNumber' => '124', // Indicates Anchor flight number
                'ConnectionIndicator' => false // Indicates that the Anchor flight has any connecting flight or not (Optional)
                )
             */
            $SearchAirLeg['AirLegModifiers'] = $payload['AirLegModifiers'];
        }
        // Departure leger
        array_push($parameters['SearchAirLeg'], $SearchAirLeg);

        if (strtolower($payload['TripType']) == 'round')
        {
            $SearchAirLeg['SearchOrigin']['CityOrAirport']['Code'] = $payload['Destination'];
            $SearchAirLeg['SearchOrigin']['CityOrAirport']['PreferCity'] = 'true';
            $SearchAirLeg['SearchDestination']['CityOrAirport']['Code'] = $payload['Origin'];
            $SearchAirLeg['SearchDestination']['CityOrAirport']['PreferCity'] = 'true';
            $SearchAirLeg['SearchDepTime']['PreferredTime'] = $ArrivalTime;

            array_push($parameters['SearchAirLeg'], $SearchAirLeg);
        }

        $parameters['SearchPassenger'] = array();
        $passenger = array();
        // Passenger Adult
        for ($i = 0; $i < $payload['SearchPassenger']['Adult']; $i++) {
            array_push($parameters['SearchPassenger'], array('Code' => 'ADT'));
            array_push($passenger, array('Code' => 'ADT', 'Name' => 'Adult'));
        }

        // Passenger: Children
        for ($i = 0; $i < $payload['SearchPassenger']['Children']; $i++) {
            array_push($parameters['SearchPassenger'], array('Code' => 'CNN'));
            array_push($passenger, array('Code' => 'CNN', 'Name' => 'Children'));
        }

        // Passenger: Infant
        for ($i = 0; $i < $payload['SearchPassenger']['Infant']; $i++) {
            array_push($parameters['SearchPassenger'], array('Code' => 'INF'));
            array_push($passenger, array('Code' => 'INF', 'Name' => 'Infant'));
        }

        return $parameters;
    }
}