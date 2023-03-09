<?php

use Students\John\app\controller\AdminController;
use Students\John\app\controller\HomeController;
use Students\John\app\route\Route;


//Admin URL Begin


Route::get('/', [HomeController::class, 'home']);
