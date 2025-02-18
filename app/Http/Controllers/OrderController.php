<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        $cartItems = session()->get('cart', []);
        if (empty($cartItems)) {
            return redirect()->route('cart.show')->with('error', 'Tu carrito está vacío');
        }

        return view('frontend.orders.checkout', compact('cartItems', 'categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $cartItems = session()->get('cart', []);
        $total = 0;


            //Verificar stock antes de crear la orden
            foreach ($cartItems as $id => $details) {
                    $product = Product::find($id);
                    if ($product->stock < $details['quantity']) {
                        return redirect()->back()->with('error', "Stock insuficiente para {$product->name}. Stock disponible: {$product->stock}");
                    }
                        $total += $details['price'] * $details['quantity'];
                }
         

            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'total_amount' => $total,
                'status' => 'pending'
            ]);

            foreach ($cartItems as $id => $details) {
                $product = Product::find($id);

                // Actualizar stock del producto 
                $product->decrement('stock', $details['quantity']); //Actualizar stock

                $order->items()->create([
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price']
                ]);
       
            }

            // Envia confirmacion email
            Mail::to($order->email)->send(new OrderConfirmation($order));

 
            session()->forget('cart'); //Limpia el carrito de la sesión

            return redirect()->route('orders.success', $order->id);
        
    }
    public function success($id)
    {

        $categories = Category::all();
        $subcategories = Subcategory::all();

        $order = Order::findOrFail($id);
        return view('frontend.orders.success', compact('order', 'categories', 'subcategories'));
    }
}
