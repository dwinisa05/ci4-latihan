<?php

namespace App\Models;

class Api
{
    function getData($url, $headers = [])
    {
        // use guzzle
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', $url, [
            'headers' => $headers
        ]);
        $response = json_decode($response->getBody(), true);
        return $response;
    }

    function postData($url, $data)
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('POST', $url, [
            'form_params' => $data
        ]);
        $response = json_decode($response->getBody(), true);
        return $response;
    }
}
