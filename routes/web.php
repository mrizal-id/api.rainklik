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

Route::get('/', function () {
    if (app()->environment('local')) {
        return view('home.index');
    } else {
        return redirect('https://rainklik.com', 301);
    }
});

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blogs');


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/dashboard/profile', [App\Http\Controllers\UserController::class, 'edit'])->name('dashboard.profile.index');
Route::put('/dashboard/profile', [App\Http\Controllers\UserController::class, 'update'])->name('dashboard.profile.update');
