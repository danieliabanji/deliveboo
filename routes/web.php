<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\OrderController;



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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('single_restaurant', RestaurantController::class)->parameters(['restaurants' => 'restaurant:slug']);
    Route::resource('products', ProductController::class)->parameters(['products' => 'product:slug']);
    Route::resource('categories', CategoryController::class)->parameters(['categories' => 'category:slug'])->except('show', 'create', 'edit');
    Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug'])->except('show', 'create', 'edit');
    Route::resource('orders', OrderController::class)->parameters(['orders' => 'order:order_code'])->except('create', 'edit');


});

Route::post('/api/orders', 'OrderController@store');






// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';