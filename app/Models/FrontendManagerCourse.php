<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendManagerCourse extends Model
{
    use HasFactory;

    protected $table = 'frontend_manager_courses';

    protected $fillable = [
        'category_id',
        'image',
        'title',
        'real_amount',
        'discount_amount',
        'offer_expire_date',
        'course_duration',
        'total_lecture',
        'total_exam',
        'live_class',
        'course_includes',
        'description',
        'instructors',
        'routine',
    ];

    protected $casts = [
        'offer_expire_date' => 'datetime',
        'course_includes' => 'array',
        'instructors' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
