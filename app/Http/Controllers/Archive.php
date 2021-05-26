<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Archive extends Controller
{
    public function add(Request $request) {

        $archive = new \App\Archive();
        $archive->type_id=$request->input('type');
        $archive->request_id=$request->input('id');
        $archive->date_in=$request->input('date');
        $archive->user_id=Auth::user()->id;
        $archive->save();

        return redirect()->route('profile')->with('archived', true);
    }

    public function delete(Request $request) {
        \App\Archive::all()->find($request->input('id'))->delete();

        return redirect()->route('profile')->with('unarchived', true);
    }
}
