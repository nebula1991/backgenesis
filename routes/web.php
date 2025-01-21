<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;




Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/index/{category}', [HomeController::class, 'productByCategory'])->name('products.category');
Route::get('/index/{productId}', [HomeController::class, 'product'])->name('product');

Route::get('/home', function(){return view('home');})->middleware('auth');

//Rutas de autenticación
Auth::routes();


Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('subcategories', App\Http\Controllers\SubcategoryController::class);
Route::resource('products', App\Http\Controllers\ProductController::class);


//Rutas de administrador de categorias
Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('admin/categories/pdf', [CategoryController::class, 'pdf'])->name('admin.category.pdf');
Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('admin/categories/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::patch('admin/categories/{category}/update', [CategoryController::class, 'update'])->name('admin.category.update');
Route::delete('admin/categories/{category}/delete', [CategoryController::class, 'destroy'])->name('admin.category.delete');

//Rutas de admin de subcategorias
Route::get('admin/subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategory.index');



//Rutas de los productos
Route::get('admin/products', [ProductController::class, 'index'])->name('admin.products.index');
Route::get('admin/products/pdf', [ProductController::class, 'pdf'])->name('admin.products.pdf');
Route::get('admin/products/excel', [ProductController::class, 'excel'])->name('admin.products.excel');
Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
Route::post('admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::get('admin/products/{product}/update', [ProductController::class, 'update'])->name('admin.products.delete');
Route::delete('admin/products/{product}/delete', [ProductController::class, 'destroy'])->name('admin.products.delete');



