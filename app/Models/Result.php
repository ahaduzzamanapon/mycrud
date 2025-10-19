<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'student_id',
        'score',
        'total_marks',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function getStudentAnswersAttribute()
    {
        return StudentAnswer::where('exam_id', $this->exam_id)
                            ->where('student_id', $this->student_id)
                            ->get();
    }
}