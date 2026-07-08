<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ArticleController::class, 'indexany'])->name('articles.indexany');

Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('upload.image');
Route::get('/article/{name}', [ArticleController::class, 'showany'])->name('articles.showany');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');



    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index')->can('view-roles');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create')->can('view-roles');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit')->can('view-roles');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store')->can('view-roles');
    Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update')->can('view-roles');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy')->can('view-roles');

    
    Route::get('/users', [UserController::class, 'index'])->name('users.index')->can('view-users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->can('create-users');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->can('edit-users');
    Route::post('/users', [UserController::class, 'store'])->name('users.store')->can('create-users');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->can('edit-users');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->can('delete-users');
    Route::get('/users/{id}/articles', [UserController::class, 'profile'])->name('users.userProfile');
});

require __DIR__.'/auth.php';
