<?php

namespace App\Http\Controllers;

use App\Gruz;
use App\User;
use Illuminate\Http\Request;

class DeleteGruz extends Controller
{
    public function delete(Request $request, $id) {
        Gruz::all()->find($id)->delete();
        return redirect($request->input('url'))->with('gruz_deleted', true);
    }
}
