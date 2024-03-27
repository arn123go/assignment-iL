<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/crud', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('crud');
Route::get('/crud/create', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('crud.create');
Route::post('/crud/create', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('crud.store');
Route::get('/crud/edit/{post}', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('crud.edit');
Route::post('/crud/edit/{post}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('crud.update');
Route::get('/crud/read/{post}', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('crud.read');
Route::get('/crud/delete/{post}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('crud.delete');
Route::post('/crud/deletebulk', [PostController::class, 'deleteBulk'])->middleware(['auth', 'verified'])->name('crud.deletebulk');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
