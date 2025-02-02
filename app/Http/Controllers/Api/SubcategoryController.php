<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function all()
    {
        return response()->json(Subcategory::get());
    }
    
    public function index()
    {
        return response()->json(Subcategory::paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(Subcategory::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        return response()->json($subcategory);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $subcategory->update($request->all());
        return response()->json($subcategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return response()->json('ok');
    }
}
