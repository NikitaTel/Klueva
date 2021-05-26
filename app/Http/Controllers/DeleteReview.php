<?php

namespace App\Http\Controllers;

use App\Document;
use App\Gruz;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class DeleteReview extends Controller
{
    public function delete(Request $request, $id) {
        Review::all()->find($id)->delete();
        return redirect($request->input('url'))->with('review_deleted', true);
    }
}
