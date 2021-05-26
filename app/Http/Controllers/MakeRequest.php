<?php

namespace App\Http\Controllers;

use App\Gruz;
use App\Gruz_parameter;
use App\User_requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\increment;

class MakeRequest extends Controller
{
    public function addGruz(Request $request) {

        $newRequest = new User_requests();

        $newRequest->requested_user_id = Auth::user()->id;
        $newRequest->gruz_id = $request->input('gruz_id');
        $newRequest->transport_id = 0;
        $newRequest->save();

        return redirect($request->input('url'))->with('request_success', true);
    }

    public function addTransport(Request $request) {

        $newRequest = new User_requests();

        $newRequest->requested_user_id = Auth::user()->id;
        $newRequest->transport_id = $request->input('gruz_id');
        $newRequest->gruz_id = 0;

        $newRequest->save();

        return redirect($request->input('url'))->with('request_success', true);
    }
}
