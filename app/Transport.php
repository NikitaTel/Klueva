<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = ['date_in', 'date_out',
        'country_from', 'city_from', 'country_to',
        'city_to', 'body_type', 'loading_type', 'summa', 'currency', 'payment_type', 'parameter_id'];
}
