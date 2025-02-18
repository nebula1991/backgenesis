<?php

namespace App\Http\Controllers;

use App\Mail\SupplierOrderMail;
use App\Models\Event;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    public function getPrecioProduct(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $units = $request->query('units'); //Cantidad de productos

        $price = $product->price;

        $date = $request->query('date');

        // Solo busca en rate_products si se proporciona una fecha
        if ($date) {
            $date = Carbon::parse($date)->toDateString(); // Formatear la fecha

            $rateProduct = $product->rateProducts()
                ->where('start_date', '<=', $date)
                ->where('end_date', '>=', $date)
                ->orderBy('start_date', 'desc')
                ->first();

            if ($rateProduct) {
                $price = $rateProduct->price_rate;
            }
        }

        $precioTotal = $price * $units;

        return response()->json(['price' => $precioTotal]);
    }
    
    public function index(Request $request)
    {
        $products = Product::where('stock', '>', 0)->get();
        $suppliers = Supplier::all();
        return view('admin.events.index', compact('products', 'suppliers'));
    }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // Validamos los datos
        $request->validate([
            'title' => 'required|max:255',
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'units' => 'required|integer|min:1',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
            'startTime' => 'required|date_format:H:i',
            'endTime' => 'nullable|date_format:H:i|after_or_equal:startTime',
        ]);

        $product = Product::findOrFail($request->product_id);


        $price = $product->price; //Precio del producto
        $date = Carbon::parse($request->start)->toDateString(); //Fecha del evento

        $cantidad = $request->units;

        $rateProduct = $product->rateProducts()
            ->where('start_date', '<=', $date)
            ->where('end_date', '>=', $date)
            ->orderBy('start_date', 'desc')
            ->first();

        if ($rateProduct) {
            $price = $rateProduct->price_rate; //Usar el precio de rate_products si existe
        }

        $precioTotal = $price * $cantidad;

        // Ajustar las fechas a la zona horaria correcta
        $startDateTime = Carbon::parse($request->start . ' ' . $request->startTime)->setTimezone(config('app.timezone'));
        $endDateTime = $request->end && $request->endTime ?
            Carbon::parse($request->end . ' ' . $request->endTime)->setTimezone(config('app.timezone')) :
            $startDateTime;




        // Guardamos el evento
        $evento = Event::create([
            'title' => $request->title,
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'units' => $request->units,
            'price' => $precioTotal,
            'start' => $startDateTime,
            'end' => $endDateTime,
        ]);


        $supplier = Supplier::findOrFail($request->supplier_id);

        Mail::to($supplier->email)->send(new SupplierOrderMail($evento));


        return response()->json($evento);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $event = Event::all();
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'product_id' => 'required|integer|min:0',
            'units' => 'required|integer|min:1',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
            'startTime' => 'required|date_format:H:i',
            'endTime' => 'nullable|date_format:H:i|after_or_equal:startTime',
        ]);


        $event = Event::findOrFail($id);

        $product = Product::findOrFail($request->product_id);


        $cantidad = $request->units;

        $price = $product->price;
        $date  = Carbon::parse($request->start)->toDateString();

        $rateProduct = $product->rateProducts()
            ->where('start_date', '<=', $date)
            ->where('end_date', '>=', $date)
            ->orderBy('start_date', 'desc')
            ->first();


        if ($rateProduct) {
            $price = $rateProduct->price_rate;
        }

        $precioTotal = $price * $cantidad;

        // Ajustar las fechas a la zona horaria correcta
        $startDateTime = Carbon::parse($request->start . ' ' . $request->startTime)->setTimezone(config('app.timezone'));
        $endDateTime = $request->end && $request->endTime ?
            Carbon::parse($request->end . ' ' . $request->endTime)->setTimezone(config('app.timezone')) :
            $startDateTime;

        // Actualizar el evento
        $event->update([
            'title' => $request->title,
            'product_id' => $request->product_id,
            'units' => $request->units,
            'price' => $precioTotal,
            'start' => $startDateTime,
            'end' => $endDateTime,
        ]);


        // Retornar una respuesta exitosa
        return response()->json(['success' => true, 'message' => 'Evento actualizado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return response()->json(['success' => true, 'message' => 'Evento eliminado']);
    }
}
