<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = 'department_id';
    protected $fillable = ['department_name'];

    public function students()
    {
        return $this->hasMany(Student::class, 'department_id');
    }
}
