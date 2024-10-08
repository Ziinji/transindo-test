<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable
{
    protected $fillable = ['company_name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
