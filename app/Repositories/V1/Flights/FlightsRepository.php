<?php

namespace App\Repositories\V1\Flights;

use App\Repositories\Repository;
use GuzzleHttp\Client;

class FlightsRepository extends Repository
{
    const API_PATH = '/v1/flights';

    public function getApi()
    {
        return env('API_BASE_URL');
    }

    public function fetchActivities($data)
    {
        $client = new Client([
            'base_uri' => $this->getApi(),
        ]);
        return $client->request('GET', self::API_PATH, [
            'query' => $data
        ])->getBody();
    }
}
