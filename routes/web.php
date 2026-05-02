<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes — Alpha Soft by Computronix SARL
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/alpha-soft', [PageController::class, 'alphaSoft'])->name('alpha-soft');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/repairs', [PageController::class, 'repairs'])->name('repairs');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');
Route::post('/chat', [\App\Http\Controllers\ChatController::class, 'chat'])->name('chat');

// Language Switch
Route::get('lang/{locale}', [\App\Http\Controllers\LanguageController::class, 'switch'])->name('lang.switch');
