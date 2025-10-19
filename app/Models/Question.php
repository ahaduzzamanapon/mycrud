<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_text',
        'type',
        'subject_id',
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questionPapers()
    {
        return $this->belongsToMany(QuestionPaper::class, 'question_paper_question')
                    ->withPivot('marks')
                    ->withTimestamps();
    }
}