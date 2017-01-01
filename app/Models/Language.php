<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {
    
    protected $table = 'languages';
    protected $primaryKey = 'language_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_name'
    ];
    
}
