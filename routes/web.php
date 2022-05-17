<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(["auth"])->group(function () {
  Route::get("/", function () {
    return view("index");
  });

  Route::group(["prefix" => "/about"], function () {
    Route::get("/", function () {
      return view("about.index", ["user" => Auth::user()]);
    });

    Route::get("/{user}", function (User $user) {
      Storage::copy(Storage::url($user["img"]), "/");
      return view("about.person", ["user" => $user]);
    })->where("user", ".*\@.*");
  });

  Route::group(["prefix" => "/posts"], function () {
    Route::get("/", [PostController::class, "index"]);
    Route::get("/new", [PostController::class, "new"]);
    Route::post("/new", [PostController::class, "handleNew"]);
    Route::get("/{post:slug}/edit", [PostController::class, "edit"]);
    Route::get("/{post:slug}/delete", [PostController::class, "delete"]);
    Route::get("/{post:slug}", [PostController::class, "detail"])->where(
      "post",
      "[^0-9]*"
    );
  });

  Route::group(["prefix" => "/categories"], function () {
    Route::get("/", function () {
      try {
        $categories = Category::orderBy("name")->paginate(10);
        $categories->withPath("/categories");
      } catch (Exception) {
        $categories = [];
      }
      return view("categories.index", ["categories" => $categories]);
    });

    Route::get("/{category:slug}", function (Category $category) {
      return view("categories.detail", ["category" => $category]);
    });
  });
});

Route::get("/login", [
  \App\Http\Controllers\LoginController::class,
  "view",
])->name("login");

Route::post("/login", [\App\Http\Controllers\LoginController::class, "login"]);

Route::get("/register", [
  \App\Http\Controllers\RegisterController::class,
  "view",
]);

Route::post("/register", [
  \App\Http\Controllers\RegisterController::class,
  "register",
]);

Route::get("/logout", function (Request $request) {
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerate();
  return redirect("/login");
});

Route::get("/bro", function () {
  dd(request()->ip());
  return "aldo";
})->middleware("aldo");

Route::get("/hh", function () {
  return "hh";
})->name("def");
