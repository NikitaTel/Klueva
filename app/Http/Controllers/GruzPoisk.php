<?php

namespace App\Http\Controllers;

use App\Gruz;
use Illuminate\Http\Request;

class GruzPoisk extends Controller
{
    public function filter(Request $request) {
        $gruzs = Gruz::all()->where('city_to', $request->input('city_to'))
            ->where('country_to', $request->input('country_to'))
            ->where('city_from', $request->input('city_from'))
            ->where('country_from', $request->input('country_from'))
            ->where('body_type', $request->input('body_type'))
            ->where('date_in', $request->input('date_in'))
            ->where('date_out', $request->input('date_out'));

        return redirect()->route('filter',
            [
                'city_to' => $request->input('city_to'),
                'country_to' => $request->input('country_to'),
                'city_from' => $request->input('city_from'),
                'country_from' => $request->input('country_from'),
                'body_type' => $request->input('body_type'),
                'name' => $request->input('name'),
                'date_in' => $request->input('date_in'),
                'date_out' => $request->input('date_out'),
                'gruzs' => $gruzs,
                'ok'=> true
            ]);
    }
}
