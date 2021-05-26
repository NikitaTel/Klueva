<?php

namespace App\Http\Controllers;

use App\Gruz;
use Illuminate\Http\Request;

class TransportPoisk extends Controller
{
    public function filter(Request $request) {

        return redirect()->route('filter_transport',
            [
                'city_to' => $request->input('city_to'),
                'country_to' => $request->input('country_to'),
                'city_from' => $request->input('city_from'),
                'country_from' => $request->input('country_from'),
                'body_type' => $request->input('body_type'),
                'date_in' => $request->input('date_in'),
                'date_out' => $request->input('date_out'),
                'ok'=> true
            ]);
    }
}
