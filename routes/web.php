<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get("/", function () {
//     return view("home", ["title" => "Halaman Home"]);
// });



Route::prefix("admin")
    ->group(function () {

        Route::get("/", [DashboardAdminController::class, "dashboard"])
            ->middleware("auth");
        Route::get("/dashboard", [DashboardAdminController::class, "dashboard"])
            ->middleware("auth");

        Route::resource("posts", PostAdminController::class);
    });

Route::get("/register", [AuthController::class, "registerForm"]);
Route::post("/register", [AuthController::class, "register"]);
Route::get("/login", [AuthController::class, "loginForm"])->name("login-form");
Route::post("/login", [AuthController::class, "login"]);
Route::post("/logout", [AuthController::class, "logout"]);

Route::get("/", [PostController::class, "index"]);

Route::get("/posts", [PostController::class, "index"]);

Route::get("/posts/create", function () {
    return view('posts.create', [
        "title" => "Create Post",
        "active" => "posts",
    ]);
});


Route::get("/posts/{id}", [PostController::class, "show"]);



Route::get("/about", [PageController::class, "about"]);

Route::get("/categories/{slug}", [CategoryController::class, "findBySlug"]);

Route::get("/send-mail", function () {});
