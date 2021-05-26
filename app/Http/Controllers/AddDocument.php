<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddDocument extends Controller
{
    public function add(Request $request) {

        $document = new Document();
        $document->document_name=$request->file('document_file')->getClientOriginalName();
        $document->document_file=$request->file('document_file')->store('documents', 'public');
        $document->user_id=Auth::user()->id;

        $document->save();

        return redirect()->route('profile')->with('document_success', true);
    }
}
