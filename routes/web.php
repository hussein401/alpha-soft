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
Route::get('/laptops', [PageController::class, 'laptops'])->name('laptops');
Route::get('/laptops/{id}', [PageController::class, 'laptopShow'])->name('laptop.show');
Route::get('/repairs', [PageController::class, 'repairs'])->name('repairs');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');
Route::post('/chat', [\App\Http\Controllers\ChatController::class, 'chat'])->name('chat');

// Language Switch
Route::get('lang/{locale}', [\App\Http\Controllers\LanguageController::class, 'switch'])->name('lang.switch');

// Admin Panel
Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/admin/laptops/{id}/price', [\App\Http\Controllers\AdminController::class, 'updatePrice'])->name('admin.laptop.price');
