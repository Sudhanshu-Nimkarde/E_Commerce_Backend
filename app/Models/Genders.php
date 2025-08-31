<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genders extends Model
{

    protected $table = 'genders'; // Optional, but good if class name is singular

    protected $fillable = [
        'gender',
    ];

    public $timestamps = true; // optional, default is true
    
}
