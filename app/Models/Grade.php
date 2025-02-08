<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $primaryKey = 'grade_id';
    protected $fillable = ['student_id', 'course_id', 'assessment_id', 'obtained_score'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function assessment()
    {
        return $this->belongsTo(Assessment::class, 'assessment_id');
    }
}
