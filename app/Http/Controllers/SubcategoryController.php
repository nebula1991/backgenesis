<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(Request $request)
    {   
        $query = Subcategory::query();


        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                foreach (Category::$searchable as $attribute) {
                    $q->orWhere($attribute, 'like', '%' . $search . '%');
                }
            });
        }
        
        $subcategories = Subcategory::with('categories')->get();

        $subcategories = $query->paginate(10);
        return view('admin.subcategory.index', compact('subcategories'));
        
    }

    public function create()
    {
        $categories = Category::all(); // Obtener todas las categorías
        return view('admin.subcategory.create', compact('categories'));
      
    }
  /**
     * Crear una nueva subcategoría.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id', // Verificar que la categoría exista
        ]);

        $subcategory = Subcategory::create($request->all());

        return redirect()->route('admin.subcategory.index')
        ->with('success', 'Categoria creada correctamente.');

    
    }

     /**
     * Mostrar una subcategoría específica.
     */
    public function show($id)
    {
        $subcategory = Subcategory::with('categories')->findOrFail($id);
        return view('admin.subcategory.show', compact('subcategory'));
    }
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
      
        $categories = Category::all(); // Obtener todas las categorías para el selector
       

        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }
    /**
     * Actualizar una subcategoría.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subcategory = Subcategory::findOrFail($id);
     
        // $subcategory->update($request->all());
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');

            // Solo actualizar el 'category_id' si se ha cambiado en el formulario
        if ($subcategory->category_id !== $request->input('category_id')) {
            $subcategory->category_id = $request->input('category_id');
        }

          // Guardar los cambios
            $subcategory->save();

        return redirect()->route('admin.subcategory.index')->with('success', 'Subcategoría actualizada correctamente.');
    }

     /**
     * Eliminar una subcategoría.
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('admin.subcategory.index')->with('success', 'Subcategoria eliminada con éxito');
    }
}
