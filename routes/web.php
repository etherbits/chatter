<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

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

Route::post("/chats", [ChatController::class, 'store'])->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
