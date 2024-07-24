<?php

namespace App\Providers;

use App\Models\TeacherCourse;
use App\Observers\TeacherCourse\TeacherCourseObserver;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\Eloquent\BlogRepository;
use App\Repositories\Eloquent\CourseRepository;
use App\Repositories\Eloquent\TeacherCourseRepository;
use App\Repositories\TeacherCourseRepositoryInterface;
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
