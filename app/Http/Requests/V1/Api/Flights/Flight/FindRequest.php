<?php

namespace App\Http\Requests\V1\Api\Flights\Flight;


use Illuminate\Foundation\Http\FormRequest;

class FindRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'flight_number' => 'required|string',
//            'flight_iata' => 'required_without:flight_number,flight_icao|nullable|string',
//            'flight_icao' => 'required_without:flight_iata,flight_number|nullable|string',
        ];
    }

    public function attributes()
    {
        return [
            'flight_number' => __('fields.account.addresses.city_uuid'),
            'flight_iata' => __('fields.account.addresses.city_uuid'),
            'flight_icao' => __('fields.account.addresses.city_uuid'),
        ];
    }
}
