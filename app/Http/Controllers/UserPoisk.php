<?php

namespace App\Http\Controllers;

use App\Gruz;
use Illuminate\Http\Request;

class UserPoisk extends Controller
{
    public function filter(Request $request) {
        return redirect()->route('filter_users',
            [
                'user_company' => $request->input('user_company')
            ]);
    }
}
