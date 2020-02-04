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

Route::get('/home', "Frontend\\TicketsController@index")
    ->name("home");

Auth::routes(
    [
        'verify' => true,
        'confirm' => true
    ]
);

Route::name("profile.")
    ->prefix("/profile")
    ->group(
        function () {
            Route::get("{user}", "Auth\ProfileController@edit")
                ->name("edit");
            Route::post("{user}", "Auth\ProfileController@update")
                ->name("update");
        }
    );

Route::name("ticket.")
    ->prefix("/ticket")
    ->group(
        function () {
            Route::get('list', "Frontend\\TicketsController@index")
                ->name("list");
            Route::get("new", "Frontend\TicketsController@create")
                ->name("create");
            Route::post("save", "Frontend\TicketsController@store")
                ->name("store");
            Route::get("show/{ticket}", "Frontend\TicketsController@show")
                ->name("show");
        }
    );