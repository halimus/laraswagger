<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    
    protected $table = 'books';
    protected $primaryKey = 'book_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'pages_count', 'published_date', 'price', 'quantity', 'author_id', 'field_id', 'language_id'
    ];
    
}