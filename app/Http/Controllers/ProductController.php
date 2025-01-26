<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RateProduct;
use App\Models\Subcategory;
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
        // Obtener los productos con las relaciones de categoria y subcategoria
        $products = $query->with(['category', 'subcategory', 'rateProducts'])->paginate(); // Cargar las relaciones de category y subcategory

        // Retornar la vista con los productos cargados
        return view('admin.products.index', [
            'products' => $products,
        ])->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }
    public function pdf()
    {
        $products = Product::all();
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

        // Obtener los datos relacionados, incluyendo las subcategorías
        $relatedData = $this->getRelatedData($product);

        // Asegúrate de incluir las subcategorías en los datos pasados a la vista
        $relatedData['subcategories'] = Subcategory::all();
        $relatedData['rate_product'] = RateProduct::all();

        $relatedData['product'] = $product;  // Agregar $product a los datos de la vista

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

        $request->validate([
            'name' => 'required|min:5|max:30',
            'description' => 'required|min:5',
            'price' => 'required|numeric|min:0',
            'image' => 'mimes:jpeg,jpg,png|max:10240',
            'category_id' => 'required|integer',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
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
            ->with('success', 'Producto creado correctamente.');
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

        $rateProducts = $product->rateProducts()->get() ?? [];
        $relatedData = $this->getRelatedData($product);
        return view('admin.products.edit', array_merge([
            'product' => $product,
            'rateProducts' => $rateProducts,
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

        $validatedData = $request->validate([

            'name' => 'required|min:5|max:30',
            'description' => 'required|min:5',
            'price' => 'required|numeric|min:0',
            'image' => 'mimes:jpeg,jpg,png|max:10240',
            'category_id' => 'required|integer',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',

            'season.*' => 'required|string|max:255',
            'price_rate.*' => 'required|numeric|min:0',
            'start_date.*' => 'required|date',
            'end_date.*' => 'required|date|after_or_equal:start_date.',
        ]);


        // Eliminar temporadas marcadas como eliminadas
        $deletedSeasons = json_decode($request->input('deleted_seasons', '[]'), true);
        if (!empty($deletedSeasons)) {
            RateProduct::whereIn('id', $deletedSeasons)->delete();
        }

        //

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                // Crear la carpeta si no existe
                $imageFolder = public_path('images/products');
                if (!file_exists(public_path('images/products'))) {
                    mkdir(public_path('images/products'), 0755, true);
                }

                $imageName = time() . '_' . $file->getClientOriginalName(); // Generar un nombre único

                $file->move($imageFolder, $imageName); // Mover a la carpeta 'public/images'
                $validatedData['image'] = 'images/products/' . $imageName; // Guardar la ruta en la base de datos

            }
        }


        // Actualizar el producto principal
        $product->update($validatedData);

        // Procesar las temporadas relacionadas
        $seasons = $request->input('season', []);
        $prices = $request->input('price_rate', []);
        $startDates = $request->input('start_date', []);
        $endDates = $request->input('end_date', []);
        $seasonIds = $request->input('season_ids', []);

        // Verificar que todos los campos sean arrays
        if (
            is_array($seasons) &&
            is_array($prices) &&
            is_array($startDates) &&
            is_array($endDates) &&
            is_array($seasonIds)
        ) {

            foreach ($seasons as $index => $seasonName) {
                // Validar que el campo "name" no esté vacío
                if (empty($seasonName)) {
                    continue; // Saltar esta temporada si el nombre está vacío
                }
                $seasonData = [
                    'name' => $seasonName,
                    'price_rate' => $prices[$index] ?? null, // Usar null si no existe el índice
                    'start_date' => $startDates[$index] ?? null,
                    'end_date' => $endDates[$index] ?? null,
                ];

                // Si la temporada ya existe (tiene un ID), actualizamos
                if (isset($seasonIds[$index]) && $seasonIds[$index]) {
                    $product->rateProducts()->where('id', $seasonIds[$index])->update($seasonData);
                } else {
                    // Si no existe, la creamos
                    $product->rateProducts()->create($seasonData);
                }
            }
        } else {
            // Manejar el caso en que los datos no sean arrays
            return redirect()->back()->with('error', 'Los datos de las temporadas no son válidos.');
        }

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente');
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
        return redirect()->route('admin.products.index')->with('destroy', 'Producto eliminado correctamente');
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
