<?php

namespace App\Http\Services\V1\Flights\Flight;


use GuzzleHttp\Client;
use function PHPUnit\Framework\isNull;

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
            'query' => $this->generateApiParameters($data)
        ]);

        $body = $response->getBody();
        $flights = json_decode($body,true);

        return $flights;
    }

    public function generateApiParameters($data)
    {
        foreach ($data as $key => $value) {
            if ($value == null) {
                unset($data[$key]);
            }
        }
        $data['access_key'] = '124258e6651c63d32f7e16c97dadb36d';

        return $data;
    }
}
