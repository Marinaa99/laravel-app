<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\SuperadminMiddleware;
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
    if (auth()->user()->is_admin) {
        return redirect()->route('users.index');
    }elseif (auth()->user()){
        return redirect()->route('friends.non-friends');
    }
})->middleware(['auth', 'verified'])->name('dashboard');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','is_admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});




    Route::get('/friends/non-friends', [UserController::class, 'showNonFriends'])->name('friends.non-friends');
    Route::post('/add-friend/{id}', [FriendController::class, 'addFriend'])->name('add-friend');
    Route::get('/friends/requests', [FriendController::class, 'showFriendRequests'])->name('friends.requests');
    Route::post('/friends/requests/{friendship_id}', [FriendController::class, 'acceptFriendRequest'])->name('requests.acceptFriendRequest');
    Route::post('/friends/requests/{friendship_id}/reject', [FriendController::class, 'rejectFriendRequest'])->name('requests.rejectFriendRequest');
    Route::get('/friends/friends', [UserController::class, 'showFriends'])->name('friends.friends');
    Route::get('/messages/create/{friend_id}', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::delete('/messages/{friend_id}/{message}', [MessageController::class, 'delete'])->name('messages.delete');
    Route::post('/friends/non-friends/{friend_id}/{status}', [FriendController::class, 'getFriendshipStatus']);






require __DIR__.'/auth.php';
