<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'title',
        'author_id',
        'category_id',
        'image',
        'publisher',
        'publication_year',
        'quantity',
        'available',
        'status',
    ];
}
