<?php

use App\Http\Controllers\TemplateController;
use App\Http\Controllers\EtelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriakController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::get('/etelek', [EtelController::class, 'etelek'])->name('etelek');
Route::get('/about', [TemplateController::class, 'about'])->name('about');
Route::get('/receptek', [TemplateController::class, 'receptek'])->name('receptek');
Route::get('/services', [TemplateController::class, 'services'])->name('services');
Route::get('/blog', [TemplateController::class, 'blog'])->name('blog');
Route::get('/contact', [TemplateController::class, 'contact'])->name('contact');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/receptek/{id}', [EtelController::class, 'show'])->name('etel.megnezem');
Route::get('/kategoriak/{id}', [KategoriakController::class, 'show'])->name('kategoriak.show');
