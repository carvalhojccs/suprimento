<?php

namespace App\Providers;

use App\Repositories\Contracts\ContaRepositoryInterface;
use App\Repositories\Contracts\UnidadeRepositoryInterface;
use App\Repositories\Core\EloquentContaRepository;
use App\Repositories\Core\EloquentUnidadeRepository;
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
        $this->app->bind(UnidadeRepositoryInterface::class, EloquentUnidadeRepository::class);
        $this->app->bind(ContaRepositoryInterface::class, EloquentContaRepository::class);
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
