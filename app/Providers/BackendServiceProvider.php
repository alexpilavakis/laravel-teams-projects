<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
           'App\Repositories\Project\ProjectRepository',
            'App\Repositories\Project\DbProjectRepository'
        );
        $this->app->bind(
            'App\Repositories\Team\TeamRepository',
            'App\Repositories\Team\DbTeamRepository'
        );
    }
}
