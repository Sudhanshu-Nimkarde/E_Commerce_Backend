<?php

namespace App\Interfaces;

interface CategoryServiceInterface
{
    public function getCategories();

    public function getTenCategories();

    public function getCategoryWiseSubCategoriesList($categoryId);
}