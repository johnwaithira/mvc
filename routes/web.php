<?php

use Students\John\app\controller\AdminController;
use Students\John\app\controller\HomeController;
use Students\John\app\route\Route;


//Admin URL Begin


Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'access']);

//Admin URL END

Route::get('/c/{username}', [HomeController::class, 'home']);
Route::get('/post/{id:\d+}/{username}', [HomeController::class, 'home']);
//Route::get('/images', [HomeController::class, 'image']);
//Route::post('/image',[HomeController::class, 'upload']);