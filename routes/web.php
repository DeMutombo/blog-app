<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::get('/admin/{post_id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{post_id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{post_id}', [AdminController::class, 'destroy'])->name('admin.delete');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post');
