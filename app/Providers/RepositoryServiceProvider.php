<?php

namespace App\Providers;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\PostRepository;
use App\Repository\Eloquent\RegistrationRepository;
use App\Repository\Eloquent\ProleRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\PostRepositoryInterface;
use App\Repository\RegistrationRepositoryInterface;
use App\Repository\ProleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(RegistrationRepositoryInterface::class, RegistrationRepository::class);
        $this->app->bind(ProleRepositoryInterface::class, ProleRepository::class);
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
