<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    // use HasFactory;

    protected $primaryKey = 'assessment_id';
    protected $fillable = ['course_id', 'assessment_name', 'type', 'max_score', 'deadline'];
    public function grade()
    {
        return $this->hasMany(Grade::class, 'assessment_id');
    }

}
