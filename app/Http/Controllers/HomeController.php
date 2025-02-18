<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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
        $suppliers = Supplier::all();
        $orders = Order::all();
        
 
        $chart_options = [
            'chart_title' => 'Pedidos por mes',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',


            'filter_field' => 'created_at',
            'filter_days' => 60,
            // 'continuous_time' => true,
            'show_blank_data' => true,
            'chart_color' => '36,168,235',
        ];

        $chart = new LaravelChart($chart_options);
   

        return view('admin.dashboard',compact('categories', 'products', 'suppliers','orders', 'chart'));
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
        return view('admin.dashboard',[
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
