<?php

namespace App\Services;
use App\Models\Category;
use App\Interfaces\CategoryServiceInterface;
use App\Models\SubCategory;

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

    public function getCategoryWiseSubCategoriesList($categoryId)
    {
        if (!$categoryId) {
            return [
                'status' => false,
                'status_code' => 'EC_0010',
                'message' => 'Category id is required',
                'http_code' => 400,
            ];
        }

        if (!is_numeric($categoryId)) {
            return [
                'status' => false,
                'status_code' => 'EC_0019',
                'message' => 'Invalid category id',
                'http_code' => 400,
            ];
        }

        $getSubCateories = SubCategory::select('id', 'sub_category_name', 'image_path', 'category_id', 'created_by')
                        ->where('category_id', $categoryId)
                        ->where('is_active', 1)
                        ->get();
        
        return [
            'status' => true,
            'status_code' => 'EC_0011',
            'message' => 'Sub categories fetched successfully',
            'data' => $getSubCateories,
            'http_code' => 200,
        ];

    }
}

?>