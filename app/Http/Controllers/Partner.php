<?php

namespace App\Http\Controllers;

use App\Document;
use App\Partner_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Partner extends Controller
{
    public function request(Request $request) {

        $partner_request = new Partner_request();
        $partner_request->requested_id=Auth::user()->id;
        $partner_request->partner_id=$request->input('id');

        $partner_request->save();

        return redirect($request->input('url'))->with('partner_request_success', true);
    }

    public function decline() {

        DB::table('partner_requests')->where('partner_id', Auth::user()->id)->delete();

        return redirect()->route('profile')->with('partner_declined', true);
    }

    public function accept(Request $request) {

        $partner = new \App\Partner();
        $partner->user_id = $request->input('user_id');
        $partner->partner_id = Auth::user()->id;

        $partner->save();

        $partner2 = new \App\Partner();
        $partner2->user_id = Auth::user()->id;
        $partner2->partner_id = $request->input('user_id');

        $partner2->save();
        DB::table('partner_requests')->where('partner_id', Auth::user()->id)->delete();
        return redirect()->route('profile')->with('partner_accepted', true);
    }
}
