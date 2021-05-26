<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gruz extends Model
{
    protected $fillable = ['date_in', 'date_out',
        'country_from', 'city_from', 'country_to',
        'city_to', 'name', 'body_type', 'loading_type', 'summa', 'currency', 'payment_type', 'parameter_id'];
}
