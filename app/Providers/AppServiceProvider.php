<?php

namespace App\Providers;

use App\Console\MakeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->extend(
            'command.model.make',
            function ($command, $app) {
                return new MakeModel($app['files']);
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::share(
            [
                'static_data'  => [
                    'app_name' => config('app.name', "Bank Offer Application"),
                ],
                'auth' => function () {
                    return [
                        'user' => Auth::user() ? [
                            'id' => Auth::user()->id,
                            'name' => Auth::user()->name,
                            'email' => Auth::user()->email,
                        ] : null
                    ];
                }
            ]
        );
    }
}
