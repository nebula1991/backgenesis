<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * Initialize the query builder for the model.
     * Check if a search term is provided in the request.
     * Add conditions to filter results based on the search term.
     * Retrieve paginated results for the model.
     * Return the index view with the retrieved results.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                foreach (Product::$searchable as $attribute) {
                    $q->orWhere($attribute, 'like', '%' . $search . '%');
                }
            });
        }

        $products = $query->paginate();
        return view('admin.products.index', [
            'products' => $products,
        ])->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }
        public function pdf()
        {
            $products=Product::all();
            $pdf = Pdf::loadView('admin.products.pdf', compact('products'));
            return $pdf->stream();
        
        }
        
        public function excel()
        {
            return Excel::download(new ProductsExport, 'products.xlsx');
        }
    public function create()
    {
        $product = new Product();
        $relatedData = $this->getRelatedData($product);
        return view('admin.products.create', $relatedData);
    }

 

    /**
     * Store a newly created resource in storage.
     * Validate the incoming request.
     * Create a new record in the database.
     * Redirect to the index route with a success message.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // request()->validate(Product::$rules);
        
        
        $validatedData = $request->validate(array_merge(
            Product::$rules,
            ['image' => 'nullable|image|mimes:jpeg,jpg,png|max:10240']
        ));
        
   
        //
        
        if ($request->hasFile('image')) {
                $file = $request->file('image');
            if($file->isValid()){
                // Crear la carpeta si no existe
                $imageFolder = public_path('images/products');
                    if (!file_exists(public_path('images/products'))) {
                        mkdir(public_path('images/products'), 0755, true);
                    }

                    $imageName = time() . '_' . $file->getClientOriginalName(); // Generar un nombre único
               
                    $file->move($imageFolder, $imageName); // Mover a la carpeta 'public/images'
                    $validatedData['image'] = 'images/products/' . $imageName; // Guardar la ruta en la base de datos
                    // dd($validatedData);
                }

        }
        //
        // $product = Product::create($request->all());
        $product = Product::create($validatedData);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     * Find the model instance by ID.
     * Return the show view with the model instance.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     * Find the model instance by ID.
     * Retrieve related data for belongsTo relationships.
     * Return the edit view with the model instance and related data.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $relatedData = $this->getRelatedData($product);
        return view('admin.products.edit', array_merge([
            'product' => $product,
        ], $relatedData));
    }

    /**
     * Update the specified resource in storage.
     * Validate the incoming request.
     * Update the model instance with the request data.
     * Redirect to the index route with a success message.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $validatedData = $request->validate(array_merge(
            Product::$rules,
            ['image' => 'nullable|image|mimes:jpeg,jpg,png|max:10240']
        ));
        
   
        //
        
        if ($request->hasFile('image')) {
                $file = $request->file('image');
            if($file->isValid()){
                // Crear la carpeta si no existe
                $imageFolder = public_path('images/products');
                    if (!file_exists(public_path('images/products'))) {
                        mkdir(public_path('images/products'), 0755, true);
                    }

                    $imageName = time() . '_' . $file->getClientOriginalName(); // Generar un nombre único
               
                    $file->move($imageFolder, $imageName); // Mover a la carpeta 'public/images'
                    $validatedData['image'] = 'images/products/' . $imageName; // Guardar la ruta en la base de datos
                    // dd($validatedData);
                }

        }

      

        $product->update($validatedData);
        // $product->update($request->all());
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * Find and delete the model instance by ID.
     * Redirect to the index route with a success message.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }

    /**
     * Retrieve related data for belongsTo relationships.
     * Iterate over the fillable columns of the model.
     * If a column ends with '_id', assume it represents a belongsTo relationship.
     * Construct the relation name and related model class name.
     * If the related model class exists, load all its records.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return array
     */
    protected function getRelatedData($model)
    {
        $relatedData = [];
        foreach ($model->getFillable() as $column) {
            if (Str::endsWith($column, '_id')) {
                $relationName = Str::before($column, '_id');
                $relatedModelClass = 'App\\Models\\' . Str::studly($relationName);
                if (class_exists($relatedModelClass)) {
                     $relatedData[Str::plural($relationName)] = $relatedModelClass::all();
                }
            }
        }
        return $relatedData;
    }
}
