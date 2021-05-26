<?php

namespace App\Http\Controllers;

use App\Gruz;
use App\Review;
use App\Transport;
use App\User;
use App\User_requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteUserController extends Controller
{
    public function delete(Request $request, $id) {
        User::all()->find($id)->delete();
        DB::table('gruzs')->where('user_id', $id)->delete();
        DB::table('transports')->where('user_id', $id)->delete();
        DB::table('user_requests')->where('requested_user_id', $id)->delete();
        DB::table('documents')->where('user_id', $id)->delete();
        DB::table('partners')->where('user_id', $id)->delete();
        DB::table('partners')->where('partner', $id)->delete();
        DB::table('partner_requests')->where('requested_id', $id)->delete();
        DB::table('partner_requests')->where('partner_id', $id)->delete();
        DB::table('reviews')->where('user_id', $id)->delete();
        DB::table('reviews')->where('reviewer_id', $id)->delete();

        Review::all()->where('user_id', $id)->delete();

        return redirect($request->input('url'))->with('transport_deleted', true);
    }
}
