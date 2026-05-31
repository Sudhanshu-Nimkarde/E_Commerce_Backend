<?php

namespace App\Http\Controllers;
use App\Interfaces\CategoryServiceInterface;
use Illuminate\Http\JsonResponse;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryServiceInterface $categoryService;

    public function __construct(
        CategoryServiceInterface $categoryService
    ) {
        $this->categoryService = $categoryService;
    }

    public function getAllCategories(): JsonResponse
    {
        $categories =
            $this->categoryService
                 ->getCategories();

        return response()->json([
            'status' => true,
            'status_code' => 'EC_0004',
            'message' => 'Categories fetched successfully',
            'data' => $categories
        ]);
    }
    
}
