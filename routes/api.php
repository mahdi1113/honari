<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
    Route::group(['middleware' => ['guest', 'throttle:20,1']], function () {
        Route::post('register', 'RegisterController');
        Route::post('login', 'LoginController');
    });
    Route::group(['middleware' => ['auth:sanctum', 'throttle:20,1']], function () {
        Route::post('logout', 'LogoutController');
    });
});

Route::namespace('Blog')->group(function () {

    Route::get('get-blogs', 'IndexBlog@index');
    Route::get('get-blog/{blog}', 'ShowBLog@show');

});

Route::namespace('Purchase')->group(function () {

    Route::get('get-purchases', 'Indexpurchase@index');
    Route::get('get-purchase/{purchase}', 'Showpurchase@show');
    Route::post('store-purchase', 'Storepurchase@storeOnline')->middleware('auth:sanctum');

});

Route::namespace('Course')->group(function () {

    Route::get('get-courses', 'IndexCourse@index');
    Route::get('get-course/{course}', 'ShowCourse@show');

});

Route::middleware(['auth:sanctum','admin'])->group(function () {

    Route::namespace('Blog')->group(function () {
        Route::handler('blogs');
    });

    Route::namespace('TeacherCourse')->group(function () {
        Route::handler('teacherCourses');
    });

    Route::namespace('Course')->group(function () {
        Route::handler('courses');
    });

    Route::namespace('Purchase')->group(function () {
        Route::handler('purchases');
    });

});
