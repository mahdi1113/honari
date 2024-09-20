<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
    Route::group(['middleware' => ['throttle:20,1']], function () {
        Route::post('register', 'RegisterController');
        Route::post('login', 'LoginController');
        Route::post( 'verify-register' , 'VerifyRegister' );
        Route::post('forget-password', 'ForgetPassword');
        Route::post('verify-forget-password','ForgetPassword@verifyForgetPasswordCode');
    });
    Route::group(['middleware' => ['auth:sanctum', 'throttle:20,1']], function () {
        Route::post('logout', 'LogoutController');
    });
});

Route::namespace('password')->group(function (){
    Route::post('change-password', 'changePassword')->middleware('auth:sanctum');
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



Route::POST('test',function (){
    $apikey='231c390fd6843dc7101370396e839a9bd1a7d7d475ca34695f83d2476d29285ecuQvF6Zz8de68Jhe';
          $ghasedaksms = new \Ghasedak\GhasedaksmsApi($apikey);

    $sendDate = new DateTimeImmutable('now');
    $lineNumber = '30005088';
    $receptor = '09330166530';
    $message = 'test123pp';
    try {
        $response = $ghasedaksms->sendSingle(new \Ghasedak\DataTransferObjects\Request\SingleMessageDTO(
            sendDate: $sendDate,
            lineNumber: $lineNumber,
            receptor: $receptor,
            message: $message
        ));
        var_dump($response);
    } catch (\Ghasedak\Exceptions\GhasedakSMSException $e) {
        var_dump($e->getMessage());
    }
});
