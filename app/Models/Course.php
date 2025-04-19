<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // use HasFactory;

    protected $primaryKey = 'course_id';

    protected $fillable = [
        'course_name',
        'credit_hours',
        'semester_id',
        'department_id',
        'doctor_id',
        'assistant_id',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    // public function semester()
    // {
    //     return $this->belongsTo(Semester::class, 'semester_id');
    // }
}
