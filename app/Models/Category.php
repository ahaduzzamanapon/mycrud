<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'frontend_manager_categories';

    protected $fillable = [
        'branch_id',
        'name',
        'image',
        'slug',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(FrontendManagerCourse::class, 'category_id', 'id');
    }
}
