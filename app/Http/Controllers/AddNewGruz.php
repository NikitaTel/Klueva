<?php

namespace App\Http\Controllers;

use App\Gruz;
use App\Gruz_parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\increment;

class AddNewGruz extends Controller
{
    public function add(Request $request) {
        $date_in = $request->input('date_in');
        $date_out = $request->input('date_out');
        $country_from = $request->input('country_from');
        $city_from = $request->input('city_from');
        $country_to = $request->input('country_to');
        $city_to = $request->input('city_to');
        $name = $request->input('name');
        $body_type = $request->input('body_type');
        $loading_type = $request->input('loading_type');
        $currency = $request->input('currency');
        $summa = $request->input('summa');
        $payment_type = $request->input('payment_type');

        $gruz_parameter = new Gruz_parameter();
        $gruz_parameter->length=$request->input('length');
        $gruz_parameter->width=$request->input('width');
        $gruz_parameter->height=$request->input('height');
        $gruz_parameter->weight=$request->input('weight');
        $gruz_parameter->volume=$request->input('volume');
        $gruz_parameter->adr=$request->input('adr');
        $gruz_parameter->save();

        $gruz = new Gruz();
        $gruz->date_in = $date_in;
        $gruz->date_out = $date_out;
        $gruz->country_from = $country_from;
        $gruz->city_from = $city_from;
        $gruz->country_to = $country_to;
        $gruz->city_to = $city_to;
        $gruz->name = $name;
        $gruz->body_type= $body_type;
        $gruz->loading_type= $loading_type;
        $gruz->currency= $currency;
        $gruz->summa= $summa;
        $gruz->payment_type= $payment_type;
        $gruz->parameter_id = $gruz_parameter->id;
        $gruz->user_id = Auth::user()->id;

        $gruz->save();

        return redirect()->route('profile')->with('gruz_success', true);
    }
}
