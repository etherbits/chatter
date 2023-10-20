<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;

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

Route::view('/friends', 'friends')
    ->middleware(['auth', 'verified'])
    ->name('friends');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get("/", [ChatController::class, 'index'])->middleware(['auth', 'verified'])->name("home");
Route::get("/chats/{chat}", [ChatController::class, 'show'])->middleware(['auth', 'verified']);

Route::post("/chats", [ChatController::class, 'store'])->middleware(['auth', 'verified']);
Route::post("/chats/{chat}/add-user", [ChatController::class, 'addUser'])->middleware(['auth', 'verified']);
Route::post("/messages/{chat}", [MessageController::class, 'store'])->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
