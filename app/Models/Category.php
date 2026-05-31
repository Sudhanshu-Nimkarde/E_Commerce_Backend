<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'category_name',
        'created_by',
        'is_active'
    ];

    public $timestamps = false;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'last_modified_on';
}