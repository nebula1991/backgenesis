<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all()
    {
        return response()->json(Category::get());
    }
    
    public function index()
    {
        return response()->json(Category::paginate(10));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       return response()->json(Category::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Categoria no encontrada'
            ], 404);
        }
        return response()->json($category);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {   
        $category->update($request->all());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json('ok');
    }
}
