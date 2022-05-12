<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('App\Contracts\RepositoryInterfaceNotice', 'App\Repository\RepositoryNotice');
        \App::bind('App\Contracts\RepositoryInterfaceRole', 'App\Repository\RepositoryRole');
        \App::bind('App\Contracts\RepositoryInterfaceStatus', 'App\Repository\RepositoryStatus');
        \App::bind('App\Contracts\RepositoryInterfaceUser', 'App\Repository\RepositoryUser');
        \App::bind('App\Contracts\RepositoryInterfaceImage', 'App\Repository\RepositoryImage');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
