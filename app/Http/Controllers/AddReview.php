<?php

namespace App\Http\Controllers;

use App\Document;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddReview extends Controller
{
    public function add(Request $request) {

        $review = new Review();
        $review->review_content=$request->input('review_content');
        $review->user_id = $request->input('user_id');
        $review->recommended = $request->input('recommended') ?? 'no';
        $review->reviewer_id = Auth::user()->id;

        $review->save();

        return redirect($request->input('url'))->with('review_success', true);
    }
}
