<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $primaryKey = 'attendance_id';
    protected $fillable = [
        'student_id', 'qr_code_id', 'attendance_time', 'status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function qrCode()
    {
        return $this->belongsTo(QRCode::class, 'qr_code_id');
    }
}
