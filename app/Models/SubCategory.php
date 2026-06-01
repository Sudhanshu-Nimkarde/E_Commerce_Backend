<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
        'sub_category_name',
        'image_path',
        'category_id',
        'created_by',
        'is_active'
    ];

    public $timestamps = false;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'last_modified_on';
}