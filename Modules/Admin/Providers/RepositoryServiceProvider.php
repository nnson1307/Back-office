<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Repositories\Brand\BrandRepository;
use Modules\Admin\Repositories\Brand\BrandRepositoryInterface;
use Modules\Admin\Repositories\ConfigNotification\ConfigNotificationRepository;
use Modules\Admin\Repositories\ConfigNotification\ConfigNotificationRepositoryInterface;
use Modules\Admin\Repositories\Country\CountryRepository;
use Modules\Admin\Repositories\Country\CountryRepositoryInterface;
use Modules\Admin\Repositories\District\DistrictRepository;
use Modules\Admin\Repositories\District\DistrictRepositoryInterface;
use Modules\Admin\Repositories\Faq\FaqRepository;
use Modules\Admin\Repositories\Faq\FaqRepositoryInterface;
use Modules\Admin\Repositories\FaqGroup\FaqGroupRepository;
use Modules\Admin\Repositories\FaqGroup\FaqGroupRepositoryInterface;
use Modules\Admin\Repositories\Profile\ProfileRepo;
use Modules\Admin\Repositories\Profile\ProfileRepoInterface;
use Modules\Admin\Repositories\Form\FormRepository;
use Modules\Admin\Repositories\Form\FormRepositoryInterface;
use Modules\Admin\Repositories\FormAnswer\FormAnswerRepository;
use Modules\Admin\Repositories\FormAnswer\FormAnswerRepositoryInterface;
use Modules\Admin\Repositories\FormQuestion\FormQuestionRepository;
use Modules\Admin\Repositories\FormQuestion\FormQuestionRepositoryInterface;
use Modules\Admin\Repositories\Province\ProvinceRepository;
use Modules\Admin\Repositories\Province\ProvinceRepositoryInterface;
use Modules\Admin\Repositories\Upload\UploadRepo;
use Modules\Admin\Repositories\Upload\UploadRepoInterface;
use Modules\Admin\Repositories\Ward\WardRepository;
use Modules\Admin\Repositories\Ward\WardRepositoryInterface;
use Modules\Admin\Repositories\Notification\NotificationRepository;
use Modules\Admin\Repositories\Notification\NotificationRepositoryInterface;
use MyCore\Storage\Azure\UploadFileToAzureManager;
use MyCore\Storage\Azure\UploadFileToAzureStorage;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->singleton(ProvinceRepositoryInterface::class, ProvinceRepository::class);
        $this->app->singleton(DistrictRepositoryInterface::class, DistrictRepository::class);
        $this->app->singleton(WardRepositoryInterface::class, WardRepository::class);
        $this->app->singleton(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->singleton(NotificationRepositoryInterface::class, NotificationRepository::class);
        $this->app->singleton(UploadFileToAzureManager::class, UploadFileToAzureStorage::class);
        $this->app->singleton(FaqGroupRepositoryInterface::class, FaqGroupRepository::class);
        $this->app->singleton(FaqRepositoryInterface::class, FaqRepository::class);
        $this->app->singleton(ConfigNotificationRepositoryInterface::class, ConfigNotificationRepository::class);
        $this->app->singleton(FormRepositoryInterface::class, FormRepository::class);
        $this->app->singleton(FormAnswerRepositoryInterface::class, FormAnswerRepository::class);
        $this->app->singleton(FormQuestionRepositoryInterface::class, FormQuestionRepository::class);
        $this->app->singleton(ProfileRepoInterface::class, ProfileRepo::class);
        $this->app->singleton(UploadRepoInterface::class, UploadRepo::class);
    }
}
