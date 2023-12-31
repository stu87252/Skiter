<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
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

Route::get('/',[MessageController::class,"index"])->name('message.home');

Route::get('/crud',[MessageController::class,"create"])->name('message.create');

Route::post('/messages/store',[MessageController::class,"store"])->name('message.store');

Route::get('/messages/{id}/edit',[MessageController::class,"edit"])->name('message.edit');

Route::put('/messages/{message}/edit',[MessageController::class,"update"])->name('message.update');

Route::delete('/messages/{message}/delete',[MessageController::class,"destroy"])->name('messages.delete');

Route::get('/messages/{message}',[MessageController::class,"show"])->name('message.show');


Route::post('likes/{message}/store', [LikeController::class,"store"])->name('like.store');

Route::delete('likes/{message}/delete', [LikeController::class,"destroy"])->name('like.delete');


Route::get('/search', [MessageController::class,"search"])->name('message.search');

Route::get('/account', [MessageController::class,"account"])->name('message.account');

Route::post('/comments/{message}',[\App\Http\Controllers\CommentController::class, "store"])->name('comment.store');


require __DIR__ . '/auth.php';
