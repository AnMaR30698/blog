<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WlecomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('main.index');
// });
Route::get('/', [ WlecomeController::class , 'index'])->name('index.welcome');
Route::get('/blog', [ BlogController::class , 'index'])->name('index.blog');
Route::get('/blog/create', [ BlogController::class , 'create'])->name('create.blog')->middleware('auth');
Route::post('/blog/store', [ BlogController::class , 'store'])->name('store.blog');
Route::post('/blog/{post}/add', [ CommentController::class , 'store'])->name('add.comment');
Route::get('/blog/{post:slug}', [ BlogController::class , 'showPost'])->name('show.blog');
Route::put('/blog/{post:slug}/update', [ BlogController::class , 'update'])->name('update.blog');
Route::delete('/blog/destroy/{post}', [ BlogController::class , 'destroy'])->name('destroy.blog');
Route::get('/blog/{post:slug}/e', [ BlogController::class , 'showEditePost'])->name('edite.blog');
Route::get('/about', [ Controller::class , 'about'])->name('about');
Route::get('/contact-us', [ ContactUsController::class , 'index'])->name('index.contact');
Route::resource('/categories', CategoryController::class);



Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
