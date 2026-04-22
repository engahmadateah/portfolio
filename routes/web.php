<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;

use App\Models\Project;
use App\Models\Service;
use App\Models\Post;

Route::get('/', [HomeController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])
    ->name('projects.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/services/{service}', [ServiceController::class, 'show'])
    ->name('services.show');
