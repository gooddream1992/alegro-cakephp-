<?php

namespace MasoodRehman\Travelport;

class Config
{
    public function __construct()
    {
        $region = 'apac';
        $base_url = 'https://'.$region.'.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/';

        $this->config['API_ENDPOINT'] = $base_url;
        $this->config['API_AIR_ENDPOINT'] = $base_url.'AirService';
        $this->config['UNIVERSAL_RECORD_SERVICE_ENDPOINT'] = $base_url.'UniversalRecordService';
        $this->config['TerminalService'] = $base_url.'TerminalService';
        $this->config['API_USERNAME'] = 'Universal API/uAPI8217050422-8ffd8379';
        $this->config['API_PASSWORD'] = 'Kr9%j6$Z2?';
        $this->config['API_BRANCH_CODE'] = 'P7116701';
        $this->config['API_PCC'] = '7G7N';
        $this->config['PROVIDER'] = '1G'; // Galelio
        $this->config['AIR_WSDL_AND_SCHEMA_PATH'] = __DIR__."/wsdl_and_schema_v19.1/air_v48_0/";
    }

    public function item($key)
    {
        return $this->config[$key];
    }
}
