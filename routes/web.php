<?php


use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\MostrarProductosController;

//Ruta de la página principal
Route::get('/login', function () {
    return view('auth.login');
});


//Rutas de autenticación
Auth::routes();

//Elimina opciones de registro para administrador**
// Auth::routes(['register'=>false,'reset'=>false,'verify'=>false]);


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function(){

    Route::resource('users', UserController::class)->names('users');
    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('permissions', PermissionController::class)->names('permissions');

    Route::resource('categories', CategoryController::class)->names('category');

    Route::resource('subcategories', SubcategoryController::class)->names('subcategory');
    
    Route::resource('products', ProductController::class)->names('products');
    Route::get('admin/products/pdf', [ProductController::class, 'pdf'])->name('products.pdf');
    Route::get('admin/products/excel', [ProductController::class, 'excel'])->name('products.excel');
});





//Rutas de administrador de categorias
// Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.category.index');
// Route::get('admin/categories/pdf', [CategoryController::class, 'pdf'])->name('admin.category.pdf');
// Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
// Route::post('admin/categories/store', [CategoryController::class, 'store'])->name('admin.category.store');
// Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
// Route::patch('admin/categories/{category}/update', [CategoryController::class, 'update'])->name('admin.category.update');
// Route::delete('admin/categories/{category}/delete', [CategoryController::class, 'destroy'])->name('admin.category.delete');

//Rutas de calendario
Route::get('admin/events/precio/{product_id}', [EventController::class, 'getPrecioProduct']);
Route::get('admin/events', [EventController::class, 'index'])->name('admin.events.index');
Route::get('admin/events/show', [EventController::class, 'show'])->name('admin.events.show');
Route::post('admin/events', [EventController::class, 'store'])->name('admin.events.store');
Route::patch('admin/events/{id}', [EventController::class, 'update'])->name('admin.events.update');
Route::delete('admin/events/{id}', [EventController::class, 'destroy'])->name('admin.events.destroy');


//Rutas de admin de subcategorias
// Route::get('admin/subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategory.index');
// Route::get('admin/subcategories/create', [SubcategoryController::class, 'create'])->name('admin.subcategory.create');
// Route::post('admin/subcategories/store', [SubcategoryController::class, 'store'])->name('admin.subcategory.store');
// Route::get('admin/subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('admin.subcategory.edit');
// Route::patch('admin/subcategories/{subcategory}/update', [SubcategoryController::class, 'update'])->name('admin.subcategory.update');
// Route::delete('admin/subcategories/{subcategory}/delete', [SubcategoryController::class, 'destroy'])->name('admin.subcategory.delete');


//Rutas de los productos
// Route::get('admin/products', [ProductController::class, 'desactivarProductoSinStock']);
// Route::get('admin/products', [ProductController::class, 'index'])->name('admin.products.index');
// Route::get('admin/products/pdf', [ProductController::class, 'pdf'])->name('admin.products.pdf');
// Route::get('admin/products/excel', [ProductController::class, 'excel'])->name('admin.products.excel');
// Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
// Route::post('admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
// Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
// Route::patch('admin/products/{product}/update', [ProductController::class, 'update'])->name('admin.products.update');
// Route::delete('admin/products/{product}/delete', [ProductController::class, 'destroy'])->name('admin.products.delete');


