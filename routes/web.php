<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes (login, register, logout)
Auth::routes();

// Redirect after login
Route::get('/home', function () {
    return redirect()->route('posts.index');
})->name('home');

// Protect post routes with authentication
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::resource('posts', PostController::class);
// });