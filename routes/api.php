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

Route::namespace('Purchase')->middleware('auth:sanctum')->group(function () {

    Route::get('get-purchases', 'Indexpurchase@index');
    Route::post('store-purchase', 'Storepurchase@storeOnline')->middleware('auth:sanctum');

});

Route::namespace('Course')->group(function () {

    Route::get('get-courses', 'Indexcourse@indexOnline');
    Route::get('get-course/{course}', 'ShowCourse@showOnline');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('get-courses-user', 'IndexCourse@index');
        Route::get('get-course-user/{course}', 'ShowCourse@show');
    });

});

Route::namespace('Ticket')->middleware('auth:sanctum')->group(function () {

    Route::get('get-tickets', 'IndexTicket@indexOnline');
    Route::get('get-ticket/{ticket}', 'ShowTicket@showOnline');
    Route::post('store-ticket', 'StoreTicket@storeOnline');
    Route::put('update-ticket/{ticket}', 'UpdateTicket@updateOnline');

});


Route::namespace('User')->middleware('auth:sanctum')->group(function () {

    Route::get('get-user', 'ShowUser@showOnline');
    Route::put('update-user/{user}', 'UpdateUser@updateOnline');

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

    Route::namespace('Ticket')->group(function () {
        Route::handler('tickets');
    });

    Route::namespace('Response')->group(function () {
        Route::handler('response');
    });

    Route::namespace('FrequentlyQuestions')->group(function () {
        Route::handler('frequentlyQuestions');
    });

    Route::namespace('Item')->group(function () {
        Route::handler('items');
    });

    Route::namespace('User')->group(function () {
        Route::handler('users');
    });

    Route::namespace('Media')->group(function () {
        Route::post('store_media', 'StoreMedia');
    });

    Route::namespace('Video')->group(function () {
        Route::post('store_Video', 'StoreVideo');
    });


});
