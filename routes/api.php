<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\api\TemplateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/home' , [TemplateController::class , 'home'])->name('api.home');

Route::get('/blog' , [TemplateController::class , 'blog'])->name('api.blog');

Route::get('/category/{category}' , [TemplateController::class , 'category'])->name('api.category'); 

Route::get('search' , [TemplateController::class , 'search'])->name('api.search');
Route::get('post/{post}' , [TemplateController::class , 'single'])->name('api.single');
Route::post('post/{post}/comment', [TemplateController::class , 'comment'])->name('api.comment');

Route::post('login' , [AuthController::class , 'authenticate'])->name('api.authenticate');
Route::post('register' , [AuthController::class , 'register'])->name('api.register');

// 13 min
