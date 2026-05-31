<?php

namespace App\Services;
use App\Models\Category;
use App\Interfaces\CategoryServiceInterface;


class CategoryService implements CategoryServiceInterface
{
    public function getCategories() 
    {
        return Category::select(
            'id',
            'category_name',
            'created_by'
            )
            ->where('is_active', 1)
            ->get();
    }
}

?>