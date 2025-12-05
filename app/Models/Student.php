<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Student as Authenticatable;
class Student extends Authenticatable
{
    // use HasFactory;
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'national_id',
        'student_code',
        // 'phone_number',
        'year',
        'department_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'student_id');
    }
}

