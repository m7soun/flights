<?php

namespace App\Http\Controllers\V1\Api\Flights\Flight;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Api\Flights\Flight\FindRequest;
use App\Services\V1\Flights\Flight\FlightService;
use Illuminate\Http\Request;

class FlightController extends Controller
{

    /**
     * @var FlightService
     */
    private $flightService;

    public function __construct(FlightService $flightService)
    {
        $this->flightService = $flightService;
    }

    public function find(FindRequest $request)
    {
        $data = $request->all();
        $flights = $this->flightService->find($data);

        return response()->json(['flights' => $flights]
            , 200);
    }
}
