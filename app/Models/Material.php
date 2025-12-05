<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'materials';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'material_name',
        'material_url',
        'course_id',
        'uploaded_by',
    ];

    /**
     * Get the course that owns the material.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
    /**
     * Get the instructor who uploaded the material.
     */
    public function materialsByUploader($uploaderId)
    {
        return $this->hasMany(Material::class, 'course_id', 'course_id')
            ->where('uploaded_by', $uploaderId);
    }
    public function uploader()
    {
        return $this->belongsTo(Instructor::class, 'uploaded_by', 'instructor_id');
    }
}
