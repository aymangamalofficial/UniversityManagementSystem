<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructorCourse extends Model
{
    // use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;
    protected $fillable = ['instructor_id', 'course_id'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
