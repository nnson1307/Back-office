<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 9/19/2019
 * Time: 10:24 AM
 */

namespace Modules\BrandApi\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\BrandApi\Repositories\Brand\BrandRepository;
use Modules\BrandApi\Repositories\Brand\BrandRepositoryInterface;
use Modules\BrandApi\Repositories\BrandSubscription\BrandSubscriptionRepository;
use Modules\BrandApi\Repositories\BrandSubscription\BrandSubscriptionRepositoryInterface;
use Modules\BrandApi\Repositories\CampaignSampling\CampaignSamplingRepo;
use Modules\BrandApi\Repositories\CampaignSampling\CampaignSamplingRepoInterface;
use Modules\BrandApi\Repositories\Country\CountryRepository;
use Modules\BrandApi\Repositories\Country\CountryRepositoryInterface;
use Modules\BrandApi\Repositories\District\DistrictRepository;
use Modules\BrandApi\Repositories\District\DistrictRepositoryInterface;
use Modules\BrandApi\Repositories\Province\ProvinceRepository;
use Modules\BrandApi\Repositories\Province\ProvinceRepositoryInterface;
use Modules\BrandApi\Repositories\Service\ServiceRepository;
use Modules\BrandApi\Repositories\Service\ServiceRepositoryInterface;
use Modules\BrandApi\Repositories\Store\StoreRepository;
use Modules\BrandApi\Repositories\Store\StoreRepositoryInterface;
use Modules\BrandApi\Repositories\StoreGroup\StoreGroupRepository;
use Modules\BrandApi\Repositories\StoreGroup\StoreGroupRepositoryInterface;
use Modules\BrandApi\Repositories\User\UserRepository;
use Modules\BrandApi\Repositories\User\UserRepositoryInterface;
use Modules\BrandApi\Repositories\Ward\WardRepository;
use Modules\BrandApi\Repositories\Ward\WardRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            StoreRepositoryInterface::class,
            StoreRepository::class
        );
        $this->app->singleton(
            BrandSubscriptionRepositoryInterface::class,
            BrandSubscriptionRepository::class
        );
        $this->app->singleton(
            ProvinceRepositoryInterface::class,
            ProvinceRepository::class
        );
        $this->app->singleton(
            DistrictRepositoryInterface::class,
            DistrictRepository::class
        );
        $this->app->singleton(
            BrandRepositoryInterface::class,
            BrandRepository::class
        );
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->singleton(
            StoreGroupRepositoryInterface::class,
            StoreGroupRepository::class
        );
        $this->app->singleton(
            WardRepositoryInterface::class,
            WardRepository::class
        );
        $this->app->singleton(
            CountryRepositoryInterface::class,
            CountryRepository::class
        );
        $this->app->singleton(
            ServiceRepositoryInterface::class,
            ServiceRepository::class
        );
        $this->app->singleton(CampaignSamplingRepoInterface::class, CampaignSamplingRepo::class);
    }
}
