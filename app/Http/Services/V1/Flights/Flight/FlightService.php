<?php

namespace App\Http\Services\V1\Flights\Flight;


use GuzzleHttp\Client;

class FlightService
{
    public function __construct()
    {
    }

    public function find($data)
    {
        $client = new Client([
            'base_uri' => 'http://api.aviationstack.com',
        ]);

        $response = $client->request('GET', '/v1/flights', [
            'query' => [
                'access_key' => '124258e6651c63d32f7e16c97dadb36d',
                'flight_iata' => 'UA1192',
            ]
        ]);

        $body = $response->getBody();
        $arr_body = json_decode($body);
        return $arr_body;
    }
}
