<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return redirect('/home');
});

// Home page
Route::get('/home', function () {
    return view('home', [
        'title' => 'New Diamond Academy',
        'headerTitle' => 'New Diamond Academy'
    ]);
})->name('home');

// About page
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/about/edit', [AboutController::class, 'edit'])->middleware('admin')->name('about.edit');
Route::put('/about', [AboutController::class, 'update'])->middleware('admin')->name('about.update');

use Illuminate\Http\Request;

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin panel (use admin middleware)
Route::get('/admin', function () {
    return view('admin');
})->middleware('admin')->name('admin');
Route::post('/admin/toggle-admin/{user}', [AuthController::class, 'toggleAdmin'])->middleware('admin')->name('admin.toggle-admin');

// Teacher/Founder slider
Route::get('/slider', function () {
    return view('slider');
})->name('slider');

// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

// Recommendations / Suggestions
use App\Http\Controllers\RecommendationController;
Route::get('/recommendations/create', [RecommendationController::class, 'create'])->name('recommendations.create');
Route::post('/recommendations', [RecommendationController::class, 'store'])->name('recommendations.store');
Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');
Route::get('/recommendations/{recommendation}/attachment', [RecommendationController::class, 'downloadAttachment'])->name('recommendations.attachment');
Route::delete('/recommendations/{id}', [RecommendationController::class, 'destroy'])->middleware('admin')->name('recommendations.delete');
