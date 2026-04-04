<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'Index'])->name('index');

// Route::get('/about', function () {
//     return view('about');
// })->name('about');

Route::get('/about', [UserController::class, 'about'])->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/alldoctors', [UserController::class, 'allDoctors'])->name('alldoctors');
Route::get('/dashboard', [UserController::class, 'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard');
    Route::get('/admin/add_doctors', [AdminController::class, 'AddDoctors'])->name('add_doctors');
    Route::post('/admin/add_doctors', [AdminController::class, 'postAddDoctors'])->name('post_add_doctor');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
