<?php

namespace App\Services\V1\Flights\Flight;


use App\Repositories\V1\Flights\FlightsRepository;

class FlightService
{
    /**
     * @var FlightsRepository
     */
    private $flightsRepository;

    public function __construct(FlightsRepository $flightsRepository)
    {
        $this->flightsRepository = $flightsRepository;
    }

    public function find($data)
    {
        $flightActivities = $this->flightsRepository->fetchActivities($this->generateApiParameters($data));
        return $this->map(json_decode($flightActivities, true));
    }

    public function generateApiParameters($data)
    {
        foreach ($data as $key => $value) {
            if ($value == null) {
                unset($data[$key]);
            }
        }
        $data = $this->formatParameters($data);
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

    public function formatParameters($data)
    {
        array_walk($data, function (&$value, $key) {
            $value = strtoupper(
                removeSpaces(
                    trim($value)
                )
            );
        });

        return $data;
    }
}
