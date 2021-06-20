<?php

namespace App\Http\Controllers;

use App\Gruz;
use App\Transport;
use App\Transport_parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddNewTransport extends Controller
{
    public function add(Request $request) {

        $date_in = $request->input('date_in');
        $date_out = $request->input('date_out');
        $country_from = $request->input('country_from');
        $city_from = $request->input('city_from');
        $country_to = $request->input('country_to');
        $city_to = $request->input('city_to');
        $body_type = $request->input('body_type');
        $loading_type = $request->input('loading_type');
        $currency = $request->input('currency');
        $summa = $request->input('summa');
        $payment_type = $request->input('payment_type');

        $transport_parameter = new Transport_parameter();
        $transport_parameter->length=$request->input('length');
        $transport_parameter->width=$request->input('width');
        $transport_parameter->height=$request->input('height');
        $transport_parameter->weight=$request->input('weight');
        $transport_parameter->volume=$request->input('volume') || 0;
        $transport_parameter->adr=$request->input('adr');
        $transport_parameter->save();

        $transport = new Transport();
        $transport->date_in = $date_in;
        $transport->date_out = $date_out;
        $transport->country_from = $country_from;
        $transport->city_from = $city_from;
        $transport->country_to = $country_to;
        $transport->city_to = $city_to;
        $transport->body_type= $body_type;
        $transport->loading_type= $loading_type;
        $transport->currency= $currency;
        $transport->summa= $summa;
        $transport->payment_type= $payment_type;
        $transport->parameter_id = $transport_parameter->id;
        $transport->user_id = Auth::user()->id;
        $transport->save();

        return redirect()->route('profile')->with('transport_success', true);
    }
}
