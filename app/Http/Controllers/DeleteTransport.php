<?php

namespace App\Http\Controllers;

use App\Gruz;
use App\Transport;
use App\User;
use Illuminate\Http\Request;

class DeleteTransport extends Controller
{
    public function delete(Request $request, $id) {
        Transport::all()->find($id)->delete();
        return redirect($request->input('url'))->with('transport_deleted', true);
    }
}
