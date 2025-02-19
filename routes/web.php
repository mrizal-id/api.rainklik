<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingMethodController;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog', [App\Http\Controllers\PostController::class, 'index'])->name('blogs.index');
Route::get('/blog/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('blogs.show');

// Route::get('/', function () {
//     if (app()->environment('local')) {
//         Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     } else {
//         return redirect('https://rainklik.com', 301);
//     }
// });



Auth::routes();
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/profile', [App\Http\Controllers\UserController::class, 'edit'])->name('dashboard.profile.index');
    Route::put('/dashboard/profile/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('dashboard.profile.update');


    //BLOG ADMIN
    Route::get('/dashboard/post', [PostController::class, 'index'])->name('dashboard.posts.index');
    Route::get('/dashboard/post/create', [PostController::class, 'create'])->name('dashboard.posts.create');
    Route::post('/dashboard/post', [PostController::class, 'store'])->name('dashboard.posts.store');
    // Route::get('/dashboard/post', [PostController::class, 'show'])->name('dashboard.posts.show');
    Route::get('/dashboard/post/{post}', [PostController::class, 'edit'])->name('dashboard.posts.edit');
    Route::put('/dashboard/post/{post}', [PostController::class, 'update'])->name('dashboard.posts.update');
});


Route::resource('/dashboard/categories', CategoryController::class)->middleware('auth');

Route::resource('/dashboard/products', ProductController::class);
Route::resource('/dashboard/shippings', ShippingMethodController::class);
