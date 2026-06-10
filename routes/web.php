<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscriberController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/news/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');
Route::post('/chat', [\App\Http\Controllers\ChatbotController::class, 'chat'])->name('chat');

Route::view('/redaksi', 'pages.redaksi')->name('pages.redaksi');
Route::view('/pedoman-media-siber', 'pages.pedoman')->name('pages.pedoman');
Route::view('/kebijakan-privasi', 'pages.privasi')->name('pages.privasi');
