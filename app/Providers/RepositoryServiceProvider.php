<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\UsersRepository;
use App\Repository\UsersRepo;
use App\Repository\BusinessRepository;
use App\Repository\BusinessRepo;
use App\Repository\LocationRepository;
use App\Repository\LocationRepo;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UsersRepository::class, UsersRepo::class);
        $this->app->bind(BusinessRepository::class, BusinessRepo::class);
        $this->app->bind(LocationRepository::class, LocationRepo::class);
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
