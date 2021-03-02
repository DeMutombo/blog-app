<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::get('/admin/{post}/edit', [AdminController::class, 'edit'])->Middleware('can:update,post')->name('admin.edit');
Route::put('/admin/{post}', [AdminController::class, 'update'])->Middleware('can:update,post')->name('admin.update');
Route::delete('/admin/{post}', [AdminController::class, 'destroy'])->name('admin.delete');

Route::get('/admin/users/index', [UserController::class, 'index'])->name('user.all');
Route::get('/admin/users/{user}/profile', [UserController::class, 'show'])->name('user.profile');
Route::put('/admin/users/{user}/update', [UserController::class, 'update'])->name('user.profile.update');



Route::get('/post/{id}', [PostController::class, 'show'])->name('post');
