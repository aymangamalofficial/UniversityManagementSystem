<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Instructor as Authenticatable;


class Instructor extends Authenticatable
{
    // use HasFactory;

    protected $primaryKey = 'instructor_id';
    protected $fillable = ['name', 'email', 'password', 'phone_number','national_id','code', 'role_id'];


}

