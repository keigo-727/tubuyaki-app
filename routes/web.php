<?php

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

// 誤：IndexController　正：CreateController
Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class)
->name('tweet.create');

Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)
->name('tweet.update.index')->where('tweetId,[0-9]+');

Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)
->name('tweet.update.put')->where('tweetId,[0-9]+');

