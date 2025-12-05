<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    use HasFactory;

    protected $table = 'qrcode';
    protected $primaryKey = 'qr_code_id';
    protected $fillable = [
        'course_id', 'generated_by', 'qr_code_value', 'expiry_time', 'session_type'
    ];

    protected $casts = [
        'expiry_time' => 'datetime',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function generator()
    {
        return $this->belongsTo(Instructor::class, 'generated_by', 'instructor_id');
    }
}

