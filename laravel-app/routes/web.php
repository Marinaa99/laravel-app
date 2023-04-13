<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Prikaz svih korisnika
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Forma za kreiranje novog korisnika
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Kreiranje novog korisnika
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Prikaz detalja o korisniku
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

// Forma za editovanje korisnika
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Editovanje postojećeg korisnika
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Brisanje postojećeg korisnika
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
