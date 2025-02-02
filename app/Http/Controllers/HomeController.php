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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        
          // Si el calendario tiene eventos, los pasas a la vista
            $events = Event::all(); // Asumiendo que tienes un modelo Event
    
        
        return view('index',[
            'categories' => $categories,
            'products' => $products,
            'events' => $events
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
        return view('index',[
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
