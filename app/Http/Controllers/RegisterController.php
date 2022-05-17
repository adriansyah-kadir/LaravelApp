<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function view()
  {
    return view("register.index");
  }

  public function register(Request $request)
  {
    $request->validate([
      "username" => "bail|required",
      "email" => "bail|email",
      "password" => "bail|required",
    ]);

    if (User::where("email", "=", $request->input("email"))->exists()) {
      return redirect("/register")
        ->with("error", "user exist")
        ->withInput();
    }

    $img = null;

    if ($file = $request->file("img")) {
      $file->store("public/images");
      $img = "storage/images/" . $file->hashName();
    }

    User::create([
      "name" => $request->input("username"),
      "email" => $request->input("email"),
      "password" => bcrypt($request->input("password")),
      "img" => $img,
    ]);

    return redirect("/");
  }
}
