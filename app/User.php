<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthContract,CanResetPasswordContract
{
    //
    protected $fillable=['company_name','country','password','city', 'contact_name', 'phone_number', 'occupation', 'email'];
    use Authenticatable, CanResetPassword, Notifiable;
}
