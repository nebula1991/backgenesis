<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        
 
        
        return view('home',[
            'categories' => $categories,
            'products' => $products,
       
        ]);
    }

    public function product($productId)
    {
        //Obtener el producto
        $product = Product::find($productId);
        return view('product', ['product' => $product]);
    }

    public function productByCategory($category){

        $categories = Category::all();
        $category =  Category::where('name', '=', $category)->first();
        $products = Product::where('category_id', '=', $category->id)->get();
        return view('home',[
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
