<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\testController;
use Illuminate\Support\Facades\Route;

Route::middleware(["token"])->group(function () {
	Route::get('/user', [testController::class, "test"]);
});
Route::get('login', [loginController::class, "getLogin"])->name("login");
Route::post("/login", [loginController::class, "login"]);
Route::get("/logout", [testController::class, "logout"]);
