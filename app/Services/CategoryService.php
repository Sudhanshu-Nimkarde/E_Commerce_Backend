<?php

namespace App\Services;
use App\Models\Category;
use App\Interfaces\CategoryServiceInterface;


class CategoryService implements CategoryServiceInterface
{
    public function getCategories() 
    {
        return Category::selectRaw("
            id,
            category_name,
            COALESCE(image_path, '') as image_path
        ")
        ->where('is_active', 1)
        ->get();
    }

    public function getTenCategories()
    {
        return Category::selectRaw("
            id,
            category_name,
            COALESCE(image_path, '') as image_path
        ")
        ->where('is_active', 1)
        ->limit(10)
        ->get();
    }
}

?>