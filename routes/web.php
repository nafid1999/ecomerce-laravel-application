<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\CategoryProductController;

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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register  admin's routes
|
*/


Route::match(['get','post'],'/admin/login',[App\Http\Controllers\admin\AdminController::class, 'login'])->name('admin.login');
Route::middleware(['admin'])->group(function () {

    Route::get('/admin/logout',[App\Http\Controllers\admin\AdminController::class,'logout'])->name('admin.logout');
    Route::get('/admin',[App\Http\Controllers\admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/categories',[App\Http\Controllers\admin\AdminController::class, 'showCategories'])->name('admin.categories');
    // Route::get('/admin/add-edit-categorie/{id?}',[App\Http\Controllers\admin\AdminController::class, 'addEditCategorie'])->name('addEditadmin.categories');
    Route::resource('admin/categorie', App\Http\Controllers\admin\CategoryController::class)->except('show');
    Route::resource('admin/products', App\Http\Controllers\admin\ProductController::class)->except("show");
    Route::resource('admin/users', App\Http\Controllers\admin\UserController::class)->except("show");
    Route::resource('admin/orders', App\Http\Controllers\admin\OrderController::class);
    Route::put('/admin/orders/{id}',[App\Http\Controllers\admin\AdminController::class,'delevered'])->name('admin.orders.delevered');


});


/*
|--------------------------------------------------------------------------
| front end Routes
|--------------------------------------------------------------------------
|
| 
|
*/

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/home', [ProductController::class, 'index'])->name('home');


/* ----- Authentification Roots -------*/
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Auth::routes();


/* ----Cart Rootes ---*/
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart-ajouter', [CartController::class, 'store'])->name('cart-store');
Route::delete('/cartdelete/{rowId}', [CartController::class, 'destroy'])->name('cartdestroy');
Route::get('/clearcart', function () {
    Cart::destroy();
    return view('cart');
})->name('clearcart');


/* --- Products Roots --- */

Route::get('/items_cats', [CategoryProductController::class, 'index'])->name('items_cats');
Route::post('/items_cats', [CategoryProductController::class, 'index'])->name('items');

Route::get('/product/{prd_id}', [ProductController::class, 'show'])->name('product');


/*------ Checkout Rootes ----*/


Route::get('/checkout', [PaymentController::class, 'index'])->middleware('auth')->name('checkout');
Route::post('/checkout', [PaymentController::class, 'index'])->middleware('auth')->name('checkout');

Route::post('/transaction', [PaymentController::class, 'makePayment'])->middleware('auth')->name('make-payment');



/*  ------- Account Rootes ----*/
Route::get('/profile-edit', function () {
    return view('edit_account');
})->middleware('auth')->name('edit_account');

Route::post('/profile-edit', [AccountController::class, 'store'])->middleware('auth')->name('profile-edit');

Route::get('/myaccount', [AccountController::class, 'index'])->middleware('auth')->name('myaccount');

Route::get('/orders', [AccountController::class, 'showOrders'])->middleware('auth')->name('orders');



/*-----help routes ----*/
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/404', function () {
    return view('404');
})->name('404');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::fallback(function () {

    return view("404");
});