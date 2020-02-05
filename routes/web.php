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

Route::get('/admin/home', "Backend\\DashboardController@index")
    ->name("admin.home");

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
            Route::get("create", "Frontend\TicketsController@create")
                ->name("create");
            Route::post("store", "Frontend\TicketsController@store")
                ->name("store");
            Route::get("show/{ticket}", "Frontend\TicketsController@show")
                ->name("show");
        }
    );

Route::name("admin.user.")
    ->prefix("/admin/user")
    ->group(
        function () {
            Route::get('list', "Backend\\UsersController@index")
                ->name("list");
            Route::get("create", "Backend\UsersController@create")
                ->name("create");
            Route::post("store", "Backend\UsersController@store")
                ->name("store");
            Route::get("show/{ticket}", "Backend\UsersController@show")
                ->name("show");
        }
    );

Route::name("admin.ticket.")
    ->prefix("/admin/ticket")
    ->group(
        function () {
            Route::get('list', "Backend\\TicketsController@index")
                ->name("list");
            Route::get("edit/{ticket}", "Backend\TicketsController@edit")
                ->name("edit");
            Route::post("update/{ticket}", "Backend\TicketsController@update")
                ->name("update");
            Route::get("show/{ticket}", "Backend\TicketsController@show")
                ->name("show");
            Route::post("destroy/{ticket}", "Backend\TicketsController@destroy")
                ->name("destroy");
        }
    );