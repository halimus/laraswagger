<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model {
    
    protected $table = 'fields';
    protected $primaryKey = 'field_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'field_name'
    ];
    
}
