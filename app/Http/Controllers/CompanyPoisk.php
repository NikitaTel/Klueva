<?php

namespace App\Http\Controllers;

use App\Gruz;
use Illuminate\Http\Request;

class CompanyPoisk extends Controller
{
    public function filter(Request $request) {
        return redirect()->route('filter_company',
            [
                'city_country' => $request->input('city_country'),
                'occupation' => $request->input('occupation'),
            ]);
    }
}
