<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $table = 'fines';
    protected $fillable = [
        'borrow_ticket_id',
        'fine_type',
        'amount',
        'status',
    ];
}
