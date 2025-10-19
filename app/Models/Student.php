<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'address', 'date_of_birth', 'profile_picture', 'about',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function attendances()
    {
        return $this->morphMany(Attendance::class, 'attendable');
    }

    public function batches()
    {
        return $this->belongsToMany(Batch::class, 'batch_student');
    }
}
