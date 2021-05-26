<?php

namespace App\Http\Controllers;

use App\Document;
use App\Gruz;
use App\User;
use Illuminate\Http\Request;

class DeleteDocument extends Controller
{
    public function delete(Request $request, $id) {
        Document::all()->find($id)->delete();
        return redirect($request->input('url'))->with('document_deleted', true);
    }
}
