<?php

namespace App\Http\Controllers\Api;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    public function all()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }
    
    public function index()
    {
        return response()->json(Supplier::paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(Supplier::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json([
                'message' => 'Producto no encontrado'
            ], 404);
        }

        return response()->json($supplier);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        return response()->json($supplier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return response()->json('ok');
    }
}
