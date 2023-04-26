<?php

namespace Modules\Service\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Service\Repositories\Service\ServiceRepository;
use Modules\Service\Repositories\Service\ServiceRepositoryInterface;
use Modules\Service\Repositories\ServiceFeature\ServiceFeatureRepository;
use Modules\Service\Repositories\ServiceFeature\ServiceFeatureRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->singleton(ServiceFeatureRepositoryInterface::class, ServiceFeatureRepository::class);
    }
}
