<?php
use Inertia\Inertia;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TemplateController;

use App\Http\Controllers\EtelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriakController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\MessageController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KeresesController;


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/etelek', [EtelController::class, 'etelek'])->name('etelek');

Route::get('/about', [TemplateController::class, 'about'])->name('about');

Route::get('/receptek', [TemplateController::class, 'receptek'])->name('receptek');

Route::get('/services', [TemplateController::class, 'services'])->name('services');

Route::get('/blog', [TemplateController::class, 'blog'])->name('blog');

Route::get('/contact', [TemplateController::class, 'contact'])->name('contact');



Route::get('/receptek/{id}', [EtelController::class, 'show'])->name('etel.megnezem');

Route::get('/kategoriak/{id}', [KategoriakController::class, 'show'])->name('kategoriak.show');


Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages');
});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function() {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

    
    Route::get('/etelek/create', [EtelController::class, 'create'])->name('etelek.create');
    Route::post('/etelek/store', [EtelController::class, 'storeNew'])->name('etelek.storeNew');
    Route::get('/etelek/sajat', [EtelController::class, 'sajatReceptjeim'])->name('etelek.sajat');
    Route::delete('/etelek/{id}', [EtelController::class, 'destroy'])->name('etelek.destroy');
    Route::get('/etelek/{id}/edit', [EtelController::class, 'edit'])->name('etelek.edit');
    Route::put('/etelek/{id}', [EtelController::class, 'update'])->name('etelek.update');
   
    Route::get('/admin/etelek_diagram', [App\Http\Controllers\AdminController::class, 'etelekDiagram'])
    ->name('admin.etelek-diagram');

});



Route::get('/logout-page', function () {
    return Inertia::render('LogoutPage');
})->name('logout-page');


Route::post('/contact', [ContactController::class, 'store'])->name('kapcsolat.send');

Route::get('/messages/sent', [MessageController::class, 'sent'])->name('messages.sent');
Route::get('/kereses', [KeresesController::class, 'index'])->name('kereses');


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');