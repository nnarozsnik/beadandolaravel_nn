<?php
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/etelek', [EtelController::class, 'index']);

route::get('/home', [TemplateController::class, 'index']);