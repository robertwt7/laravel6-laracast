<?php

namespace App\Providers;

use app\Collaborator;
use app\ContainerExample;
use Illuminate\Support\ServiceProvider;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // This is where we bind our service provider (Container)
        // Or you can use $this->app in any ServiceProvider class
        // app()->bind will return new different classes, but if we use singleton then it will return the same class
        // In the future if we return ddd($containerExample); class from a function in route, then it will return
        app()->singleton('containerExample', function () {
            $collaborator = new Collaborator();

            return new ContainerExample($collaborator);
        });

        /*
         * Without binding the app at service provider, laravel container may also construct the app for us
         * if we try to resolve and available class (App\ContainerExample) that is injected through parameters, or facade
         * Instead of return 'containerExample', it can go to return App\ContainerExample::class, works as well in the parameters
         */
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
