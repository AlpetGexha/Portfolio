<?php

use App\Http\Controllers\BallinaController;
use App\Http\Controllers\PortofiloController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BallinaController::class, 'index'])->name('ballina');


Route::get('/blog/{post:slug}', [PostController::class, 'single'])->name('blog.single');
Route::get('/blog', [PostController::class, 'index'])->name('blog.show');


Route::get('/portofilo/{portofilo:slug}', [PortofiloController::class, 'single'])->name('project.single');
