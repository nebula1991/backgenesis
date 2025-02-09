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
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::all();

       return view('welcome', compact('categories', 'subcategories', 'products'));
    }
}
