<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Member\BlogController;
use Illuminate\Foundation\Console\AboutCommand;
use App\Http\Controllers\Member\GaleryController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');


Route::get('/menu', [MenuController::class, 'index'])->name('menu');


Route::get('/article', [ArticleController::class, 'index'])->name('article');


Route::get('/about',function() {
    return view('/user/about');
});


Route::get('/membership',function() {
    return view('/user/membership');
});


Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');//maka harus login dulu 'auth'


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // blog route
    Route::resource('member/blogs', BlogController::class)->names([
        'index' => 'member.blogs.index',
        'edit' => 'member.blogs.edit',
        'update' => 'member.blogs.update',
        'create' => 'member.blogs.create',
        'store' => 'member.blogs.store',
        'destroy' => 'member.blogs.destroy'
    ])->parameters([
        'blogs' => 'post',
    ]);


    Route::resource('member/galleries', GaleryController::class)->names([
        'index' => 'member.galleries.index',
        'edit' => 'member.galleries.edit',
        'update' => 'member.galleries.update',
        'create' => 'member.galleries.create',
        'store' => 'member.galleries.store',
        'destroy' => 'member.galleries.destroy'
    ])->parameters([
        'galleries' => 'galery',
    ]);
});

require __DIR__.'/auth.php';
