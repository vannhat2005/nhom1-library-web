<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowRequest extends Model
{
    protected $table = 'borrow_requests';
    protected $fillable = [
        'user_id',
        'book_id',
        'request_date',
        'status',
    ];
}
