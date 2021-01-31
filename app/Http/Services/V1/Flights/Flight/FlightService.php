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
            'base_uri' => env('API_BASE_URL'),
        ]);

        $response = $client->request('GET', '/v1/flights', [
            'query' => $this->generateApiParameters($data)
        ]);

        $body = $response->getBody();
        $data = $this->map(json_decode($body, true));

        return $data;
    }

    public function generateApiParameters($data)
    {
        foreach ($data as $key => $value) {
            if ($value == null) {
                unset($data[$key]);
            }
        }
        $data['access_key'] = env('API_KEY');

        return $data;
    }

    // we cant use transformers on array so i will do array mapping
    public function map($data)
    {
        return array_map(function ($data) {
            return [
                'flight_status' => $data['flight_status'],
                'departure_iata' => $data['departure']['iata'],
                'departure_airport' => $data['departure']['airport'],
                'arrival_iata' => $data['arrival']['iata'],
                'arrival_airport' => $data['arrival']['airport'],
                'airline_name' => $data['airline']['name'],
                'flight_number' => $data['flight']['number'],
                'flight_iata' => $data['flight']['iata'],
                'flight_icao' => $data['flight']['icao'],
                'aircraft_registration' => $data['aircraft'] != null ? $data['aircraft']['registration'] : 'N/A',

            ];
        }, $data['data']);
    }
}
