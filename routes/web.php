<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

// => HOME
Route::get("/", [\App\Http\Controllers\HomeController::class, 'index'])->name("home");

// => ABOUT US
Route::get("/about-us", [\App\Http\Controllers\AboutController::class, 'index'])->name('about-us');

// => SHOP
Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop');

// => CONTACT
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

// => REGISTER
Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::post("/registered", [\App\Http\Controllers\RegisterController::class, 'store'])->name('register.store');

// => LOGIN
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/doLogin', [\App\Http\Controllers\AuthController::class, 'doLogin'])->name('doLogin');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// => SINGLE CHOCOLATE PAGE
Route::get("/shop/{id}", [\App\Http\Controllers\ShopController::class, 'show'])->name('product');
// FILTER CATEGORIES
Route::post('/filter-categories', [\App\Http\Controllers\FilterCategoriesController::class, 'getChocolatesFilter'])->name('filter-categories');
// SEARCH
Route::post('/search', [\App\Http\Controllers\SearchController::class, 'searchInput'])->name('search');
// ADMIN PAGES
Route::middleware('isadmin')->group(function(){
    /* PAGES */
    Route::get('/admin-panel', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin-panel');
    Route::get('/admin-tables', [\App\Http\Controllers\AdminController::class, 'tables'])->name('tables');
    Route::get('/admin-user-activities', [\App\Http\Controllers\AdminController::class, 'users'])->name('user-activities');
    /* DELETE */
    Route::delete('/admin-delete/{id}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');
    /* INSERT */
    Route::get('/admin-forms', [\App\Http\Controllers\AdminController::class, 'forms'])->name('forms');
    Route::post('/insert-product', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
    /* UPDATE */
    Route::get('/admin-edit/{id}', [\App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin-update/{id}', [\App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
});

// ADD TO CART
Route::get('/delivered', [\App\Http\Controllers\CartController::class, 'delivered'])->name('delivered');

Route::post('/addtocart', [\App\Http\Controllers\CartController::class, 'add_to_cart']);

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
