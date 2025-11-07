<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'frontend_manager_branches';

    protected $fillable = [
        'name',
        'logo',
        'slug',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'branch_id', 'id');
    }
}
