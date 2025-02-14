<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {   
            $categories = Category::orderBy('name')->get();
            $subcategories = Subcategory::orderBy('name')->get();
            $products = Product::with(['category','subcategory'])
                ->where('stock', '>', 0)
                ->orderBy('created_at', 'desc')
                ->paginate(12);
    
           return view('frontend.welcome', compact('categories', 'subcategories', 'products'));
    }

    


}