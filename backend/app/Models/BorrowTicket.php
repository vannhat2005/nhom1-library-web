<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowTicket extends Model
{
    protected $table = 'borrow_tickets';
    protected $fillable = [
        'borrow_request_id',
        'user_id',
        'book_id',
        'borrow_date',
        'due_date',
        'status',
    ];
}
