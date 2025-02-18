<?php


use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductFrontendController;
use App\Http\Controllers\MostrarProductosController;




//Rutas de autenticación
Auth::routes();


Route::get('/login', function () {
    return view('auth.login');
})->name('login');




//Rutas Frontend Productos
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/category/{category}', [ProductFrontendController::class, 'showCategory'])->name('category.show');
Route::get('/subcategory/{subcategory}', [ProductFrontendController::class, 'showSubcategory'])->name('subcategory.show');
Route::get('/product/{id}', [ProductFrontendController::class, 'showProduct'])->name('product.show');

//Rutas Frontend Carrito
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.show');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Rutas de carrito pedidos
Route::get('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}/success', [OrderController::class, 'success'])->name('orders.success');


//Rutas para administrador "CRUD"

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class)->names('users');
    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('permissions', PermissionController::class)->names('permissions');

    Route::resource('categories', CategoryController::class)->names('category');

    Route::resource('subcategories', SubcategoryController::class)->names('subcategory');

    Route::resource('products', ProductController::class)->names('products');
    Route::get('products/pdf', [ProductController::class, 'pdf'])->name('products.pdf');
    Route::get('products/excel', [ProductController::class, 'excel'])->name('products.excel');

    Route::resource('suppliers', SupplierController::class)->names('suppliers');
    Route::get('suppliers/pdf', [ProductController::class, 'pdf'])->name('suppliers.pdf');


    //Rutas de calendario

    Route::get('events/precio/{product_id}', [EventController::class, 'getPrecioProduct'])->name('events.precio');

    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('events/show', [EventController::class, 'show'])->name('events.show');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::patch('events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});
