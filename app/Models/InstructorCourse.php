<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructorCourse extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;
    protected $fillable = ['instructor_id', 'course_id'];
}
