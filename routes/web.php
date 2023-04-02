<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ProfileGetController;


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

Route::get('/mypage', [MyPageController::class, 'index'])
->name('mypage');

Route::middleware('auth')->group(function () {
Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class)
->name('tweet.create');

Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)
->name('tweet.update.index')->where('tweetId','[0-9]+');

Route::get('/profile/edit', [\App\Http\Controllers\ProfileGetController::class,'index'])
->name('profile.edit');

Route::put('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)
->name('tweet.update.put')->where('tweetId','[0-9]+');

Route::put('/profile/edit', [\App\Http\Controllers\Tweet\Update\ProfilePutController::class,'update'])
->name('profile.edit.put');

Route::delete('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)
->name('tweet.delete');
});
Route::get('/mypage/userIcon/edit', [App\Http\Controllers\UserIconController::class, 'index'])->name('mypage.userIcon.edit');
Route::put('/mypage/userIcon/edit', [App\Http\Controllers\UserIconController::class, 'update'])->name('mypage.userIcon.edit.update');


Route::get('/mypage/headerImage/edit', [App\Http\Controllers\headerImageController::class, 'index'])->name('mypage.headerImage.edit');
Route::put('/mypage/headerImage/edit', [App\Http\Controllers\headerImageController::class, 'update'])->name('mypage.headerImage.edit.update');
Route::delete('/mypage/headerImage/delete', [App\Http\Controllers\headerImageController::class, 'delete'])->name('mypage.headerImage.edit.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
