<?php

namespace MasoodRehman\Travelport\Service;


use MasoodRehman\Travelport\Config;

abstract class SoapService
{
    /**
     * SOAP Client
     *
     * @var object
     */
    private $client = null;

    /**
     * Configuration Array
     *
     * @var array
     */
    protected $config = null;

    /**
     * Options Array
     *
     * @var array
     */
    protected $options = null;

    /**
     * Travelport API Username
     *
     * @var string
     */
    protected $username = null;

    /**
     * Travelport API Password
     *
     * @var string
     */
    protected $password = null;

    /**
     * Travelport API Endpoint
     *
     * @var string
     */
    protected $endpoint = null;

    /**
     * API Service name key for configuration array index.
     * This variable need due to `UNIVERSAL_RECORD_SERVICE_ENDPOINT`, All endpoint server by `AirService` endpoint
     * only `UNIVERSAL_RECORD_SERVICE_ENDPOINT` serve by UniversalRecordService.
     *
     * @var string
     */
    public $serviceName = 'API_AIR_ENDPOINT';

    /**
     * SoapService constructor.
     */
    public function __construct()
    {
        $this->config = new Config();

        $this->username = $this->config->item('API_USERNAME');
        $this->password = $this->config->item('API_PASSWORD');
    }

    public function callSerivce($service, $requestPayload, $wsdlAndSchemaPath = 'AIR_WSDL_AND_SCHEMA_PATH')
    {
        $this->endpoint = $this->config->item($this->serviceName);

        // Path parameter is required for booking request, because booking request wsdl is located
        // in universal_v42_0 folder path.
        $wsdl = $this->config->item($wsdlAndSchemaPath) . $service . '.wsdl';

        $this->client = new \SoapClient($wsdl, array(
            'soap_version' => 'SOAP_1_2',
            'encoding' => 'UTF-8',
            'exceptions' => true,
            'stream_context' => stream_context_create(array(
                'http' => array(
                    'header' => array(
                        'Content-Type: text/xml; charset=UTF-8',
                        'Accept-Encoding: gzip, deflate'
                    )),
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false
                )
            )),
            'trace' => true,
            'login' => $this->username,
            'password' => $this->password
        ));

        // Set the WSDL endpoint
        $this->client->__setLocation($this->endpoint);

        // Call service
        try {
            // return $this->client->__soapCall('service', array("parameters" => $requestPayload));
            return $this->client->service($requestPayload);
        } catch (\Exception $e) {
            header('Content-Type: application/json');
            echo json_encode(array(
                "ResponseStatus" => "fail",
                "RequestXml" => $this->getLastRequest(),
                "ResponseMessage" => $e->getMessage(),
                "ResponseXml" => $this->client->__getLastResponse()
            )); die();
        }
    }

    public function getLastRequest()
    {
        return $this->client->__getLastRequest();
    }

    public function getLastResponse()
    {
        return $this->client->__getLastResponse();
    }

    public function getFunctions()
    {
        return $this->client->__getFunctions();
    }
}