<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Supplier::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                foreach (Supplier::$searchable as $attribute) {
                    $q->orWhere($attribute, 'like', '%' . $search . '%');
                }
            });

        }
        $suppliers = $query->paginate(10);

        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function pdf()
    {
        $suppliers = Supplier::all();
        $pdf = Pdf::loadView('admin.suppliers.pdf', compact('suppliers'));
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $supplier = Supplier::create($request->all());

        return redirect()->route('admin.suppliers.index')
            ->with('success', 'Proveedor creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        $events = Event::where('supplier_id', $id)->with('product')->get();
         
        return view('admin.suppliers.show', compact('supplier', 'events'))->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);

        
        return view('admin.suppliers.edit',compact('supplier')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $supplier->update($request->all());

        return redirect()->route('admin.suppliers.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('admin.suppliers.index')->with('success', 'Proveedor eliminado correctamente');
    }


}
