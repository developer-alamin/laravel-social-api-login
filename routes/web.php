
<?php
use App\Http\Controllers\testController;
use App\Http\Controllers\userController;
//use App\Http\Middleware\profileAuth;
use Illuminate\Support\Facades\Route;

//cache clear
Route::get('/cache_clear', function () {
	try {
		Artisan::call('config:cache');
		Artisan::call('config:clear');
		Artisan::call('view:clear');
		Artisan::call('route:clear');
		Artisan::call('cache:clear');
		return "Success Clear";
	} catch (\Exception $e) {
		dd($e);
	}
});

//Home Route Start
Route::get("/", [userController::class, "home"])->name("home");
Route::post("/Webregister", [userController::class, "Webregister"])->name("web.register");
//Home Route End
//Login Route Start
Route::get("login", [userController::class, "login"])->name("view.login");
Route::post("PostLogin", [userController::class, "PostLogin"])->name("post.login");

//Login Route End
//User Profile Route Start
Route::middleware(["profile"])->group(function () {
	Route::get("/profile", [userController::class, "profile"])->name("profile");
});

Route::get("logout", [userController::class, "logout"])->name("logout");
//User Profile Route End
// google api login Route Start
Route::get("/google/login", [userController::class, "googleLogin"])->name("google.login");
Route::get('/google/callback', [userController::class, "googleCallback"]);
// google api login Route End

Route::get("/search", [testController::class, "search"]);