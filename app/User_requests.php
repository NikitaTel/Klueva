<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_requests extends Model
{
    protected $fillable = ['transport_id', 'gruz_id', 'requested_user_id'];
}
