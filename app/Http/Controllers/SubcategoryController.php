<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {   
        // $category = Category::with('children');
        return view('admin.subcategory.index', [
            // 'category' => $category,
            // 'subcategories' => $category->children
        ]);
    }
}
