<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateOffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_line1',
        'address_line2',
        'phone',
    ];
}
