<?php

namespace App\Http\Requests\V1\Api\Flights\Flight;


use Illuminate\Foundation\Http\FormRequest;

class FindRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'flight_number' => 'required_without_all:flight_iata,flight_icao|nullable|string',
            'flight_iata' => 'required_without_all:flight_number,flight_icao|nullable|string',
            'flight_icao' => 'required_without_all:flight_iata,flight_number|nullable|string',
        ];
    }

    public function attributes()
    {
        return [
            'flight_number' => __('fields.flights.flight_number'),
            'flight_iata' => __('fields.flights.flight_iata'),
            'flight_icao' => __('fields.flights.flight_icao'),
        ];
    }
}
