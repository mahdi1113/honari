<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\TeacherCourse;
use App\Observers\Course\CourseObserver;
use App\Observers\TeacherCourse\TeacherCourseObserver;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\Eloquent\BlogRepository;
use App\Repositories\Eloquent\CourseRepository;
use App\Repositories\Eloquent\FrequentlyQuestionsRepository;
use App\Repositories\Eloquent\PurchaseRespository;
use App\Repositories\Eloquent\ResponseRepository;
use App\Repositories\Eloquent\TeacherCourseRepository;
use App\Repositories\Eloquent\TicketRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\FrequentlyQuestionsRepositoryInterface;
use App\Repositories\PurchaseRespositoryInterface;
use App\Repositories\ResponseRepositoryInterface;
use App\Repositories\TeacherCourseRepositoryInterface;
use App\Repositories\TicketRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );

        $this->app->bind(
            TeacherCourseRepositoryInterface::class,
            TeacherCourseRepository::class
        );

        $this->app->bind(
            CourseRepositoryInterface::class,
            CourseRepository::class
        );

        $this->app->bind(
            PurchaseRespositoryInterface::class,
            PurchaseRespository::class
        );

        $this->app->bind(
            TicketRepositoryInterface::class,
            TicketRepository::class
        );

        $this->app->bind(
            ResponseRepositoryInterface::class,
            ResponseRepository::class
        );

        $this->app->bind(
            FrequentlyQuestionsRepositoryInterface::class,
            FrequentlyQuestionsRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        Route::macro('handler', function ($prefix) {
            $singular = Str::singular($prefix);
            $parameterName = Str::camel($singular);
            $name = Str::studly($singular);

            Route::get($prefix, 'Index' . $name);
            Route::post($prefix, 'Store' . $name);
            Route::put($prefix . '/{' . $parameterName . '}', 'Update' . $name);
            Route::delete($prefix . '/{' . $parameterName . '}', 'Destroy' . $name);
            Route::get($prefix . '/{' . $parameterName . '}', 'Show' . $name);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TeacherCourse::observe(TeacherCourseObserver::class);
    }
}
