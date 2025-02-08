<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $primaryKey = 'semester_id';
    protected $fillable = ['academic_year_id', 'semester_name', 'start_date', 'end_date'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'semester_id');
    }
}
