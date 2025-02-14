<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductFrontendController extends Controller
{
    
    public function showCategory(Category $category)
    {
        $categories = Category::with('subcategories')->get();
        $products = Product::where('category_id', $category->id)
            ->where('stock', '>', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('frontend.welcome', compact('categories', 'products', 'category'));
    }

    public function showSubcategory(Subcategory $subcategory)
    {
        $categories = Category::with('subcategories')->get();
        $products = Product::where('subcategory_id', $subcategory->id)
            ->where('stock', '>', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('frontend.welcome', compact('categories', 'products', 'subcategory'));
    }

    public function showProduct($id)
    {
        $categories = Category::with('subcategories')->get();
        $product = Product::findOrFail($id);
        return view('frontend.show', compact('product', 'categories'));
    }
}
