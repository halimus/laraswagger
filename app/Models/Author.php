<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {
    
    protected $table = 'authors';
    protected $primaryKey = 'author_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_name', 'email', 'phone'
    ];
}