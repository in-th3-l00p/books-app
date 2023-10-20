<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect("/", "/books")->name("index");
Route::resource("books", BookController::class);

Route::view("/login", "login")->name("login.form");
Route::post("/login", function (Request $request) {
    $credentials = $request->validate([
        "email" => "required|email",
        "password" => "required"
    ]);

    if (!Auth::attempt($credentials))
        return back()->withErrors([
            "email" => "Email or password is wrong"
        ])->onlyInput("email");
    return redirect()->route("books.index");
})->name("login.submit");
Route::get("/logout", function (Request $request) {
    session()->regenerate();
    Auth::logout();
    return redirect()->route("login.form");
})->name("logout");

Route::view("/register", "register")->name("register.form");
Route::post("/register", function (Request $request) {

})->name("register.submit");

Route::middleware("auth")->group(function () {
    Route::resource("books.reviews", ReviewController::class)
        ->only([ "store", "update", "destroy" ])
        ->scoped();
});

