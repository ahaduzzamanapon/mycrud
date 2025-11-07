<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseOutline extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pdf_path',
    ];
}
