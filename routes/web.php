<?php

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

Route::get('/', "HomeController@index")->name("home");
Route::get('/home', "HomeController@index")->name("home");

Auth::routes(
    [
        'verify' => true,
        'confirm' => true
    ]
);

Route::get("/profile/{user}", "Auth\ProfileController@edit")->name("profile.edit");
Route::post(
    "/profile/{user}",
    "Auth\ProfileController@update"
)->name("profile.update");
Route::get("/ticket/new", "Backend\TicketsController@create")->name("ticket.new");
