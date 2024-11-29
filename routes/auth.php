<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;

route::get('register',[AuthController::class, "register"])->name('auth.register');
route::post('register',[AuthController::class, "store"])->name('auth.store');
route::post('logout',[AuthController::class, "logout"])->name('auth.logout');

route::get('login',[AuthController::class, "login"])->name('login');
route::post('login',[AuthController::class, "dologin"])->name('auth.do.login');
// route::get('login',[LoginController::class, "index"]);
// route::post('submitlogin',[LoginController::class, "submitlogin"])->name('submitlogin');