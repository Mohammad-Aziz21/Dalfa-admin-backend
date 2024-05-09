<?php

namespace App\Domain\Repositories\Service;

use CURLFile;

class Service {

    /**
     * @var string
     */
    public $apiUrl;

    /**
     * Image upload constructor.
     */
    public function __construct()
    {
        $this->apiUrl = config('custom.SERVICE_BASE_URL');
    }

    /**
     * @param string $action
     * @param string $method
     * @param array $data
     * @return bool|object
     */
    public function call(string $action, string $method, array $data = []) {

        /**
         * First check & get response from cached version.
         *
         * */
        $url = $this->apiUrl . $action;

        $ch = curl_init();

        if( $method == "POST" ) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,  $data);

        }elseif($method == 'PUT'){

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "PUT");

        }elseif($method == 'GET') {

            $params = http_build_query($data);
            $url = $url . (!empty($params) ? "?" . $params : "");
        }elseif($method == "DELETE"){
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "DELETE");
        }

        $headers = [
            "Content-Type" => "application/json",
            "Accept-Encoding" => "gzip",
            "Content-Type: application/json"
        ];

        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $rawApiResponse = curl_exec ($ch);
        curl_close ($ch);
        return json_decode($rawApiResponse);

    }
}
