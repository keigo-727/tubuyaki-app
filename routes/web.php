<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/sample/{id}', [\App\Http\Controllers\sample\IndexController::class,'showId']);

Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class)
->name('tweet.index');

Route::middleware('auth')->group(function () {
Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class)
->name('tweet.create');

Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)
->name('tweet.update.index')->where('tweetId','[0-9]+');

Route::put('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)
->name('tweet.update.put')->where('tweetId','[0-9]+');

Route::delete('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)
->name('tweet.delete');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
