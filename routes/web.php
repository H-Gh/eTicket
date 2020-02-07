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

Route::get('/', "Frontend\\TicketsController@index")
    ->name("frontend.index");

Route::get('/admin/home', "Backend\\TicketsController@index")
    ->name("admin.home");

Route::get('/admin', "Backend\\TicketsController@index")
    ->name("backend.index");

Auth::routes(['verify' => true, 'confirm' => true]);

Route::resource("profile", "Auth\ProfileController")
    ->only("edit", "update")
    ->parameters(["profile" => "user"]);

Route::name("notification.")->prefix("/notification")
    ->group(function () {
        Route::get(
            "/{notification}/read",
            "Frontend\NotificationsController@read"
        )->name("read");
        Route::get(
            "/{notification}/unread",
            "Frontend\NotificationsController@unread"
        )->name("unread");
    });
Route::resource("notification", "Frontend\NotificationsController")
    ->only("index", "show");

Route::resource("ticket", "Frontend\TicketsController")
    ->except("edit", "update", "destroy");

Route::prefix("admin/")
    ->name("admin.")
    ->group(function () {
        Route::resource("user", "Backend\UsersController");
        Route::resource("ticket", "Backend\TicketsController")
        ->except("create");
        Route::resource("notification", "Backend\NotificationsController")
            ->only("index", "show");
    });
