<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'ledger_id',
        'date',
        'type',
        'amount',
        'description',
    ];

    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }
}