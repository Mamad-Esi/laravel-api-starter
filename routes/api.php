<?php

use App\Http\Controllers\api\TemplateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/home' , [TemplateController::class , 'home'])->name('api.home');

Route::get('/blog' , [TemplateController::class , 'blog'])->name('api.blog');

Route::get('/category/{category}' , [TemplateController::class , 'category'])->name('api.category'); 

Route::get('search' , [TemplateController::class , 'search'])->name('api.search');
Route::get('post/{post:slug}' , [TemplateController::class , 'single'])->name('api.single');
Route::post('post/{post:slug}/comment', [TemplateController::class , 'comment'])->name('api.comment');
// 28.34
