<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function view()
  {
    return view("login.index");
  }

  public function login(Request $request)
  {
    if (
      Auth::attempt(
        [
          "email" => $request->input("email"),
          "password" => $request->input("password"),
        ],
        $request->input("remember") ? true : false
      )
    ) {
      $request->session()->regenerate();
      return redirect()->intended();
    }

    return back()
      ->withErrors([
        "error" => "err",
      ])
      ->onlyInput("email");
  }
}
