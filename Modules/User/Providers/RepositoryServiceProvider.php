<?php
namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Repositories\Brand\BrandRepository;
use Modules\Admin\Repositories\Brand\BrandRepositoryInterface;
use Modules\User\Repositories\Admin\AdminRepository;
use Modules\User\Repositories\Admin\AdminRepositoryInterface;
use Modules\User\Repositories\AdminAction\AdminActionRepository;
use Modules\User\Repositories\AdminAction\AdminActionRepositoryInterface;
use Modules\User\Repositories\AdminGroup\AdminGroupRepositoryInterface;
use Modules\User\Repositories\AdminGroup\AdminGroupRepository;
use Modules\User\Repositories\AdminGroupAction\AdminGroupActionRepository;
use Modules\User\Repositories\AdminGroupAction\AdminGroupActionRepositoryInterface;
use Modules\User\Repositories\AdminGroupMap\AdminGroupMapRepository;
use Modules\User\Repositories\AdminGroupMap\AdminGroupMapRepositoryInterface;
use Modules\User\Repositories\AdminGroupMenu\AdminGroupMenuRepository;
use Modules\User\Repositories\AdminGroupMenu\AdminGroupMenuRepositoryInterface;
use Modules\User\Repositories\AdminHasGroup\AdminHasGroupRepository;
use Modules\User\Repositories\AdminHasGroup\AdminHasGroupRepositoryInterface;
use Modules\User\Repositories\AdminMenu\AdminMenuRepository;
use Modules\User\Repositories\AdminMenu\AdminMenuRepositoryInterface;
use Modules\User\Repositories\AdminMenuCategory\AdminMenuCategoryRepository;
use Modules\User\Repositories\AdminMenuCategory\AdminMenuCategoryRepositoryInterface;
use Modules\User\Repositories\AdminStaging\AdminStagingRepository;
use Modules\User\Repositories\AdminStaging\AdminStagingRepositoryInterface;
use Modules\User\Repositories\RoleGroup\RoleGroupRepository;
use Modules\User\Repositories\RoleGroup\RoleGroupRepositoryInterface;
use Modules\User\Repositories\Station\StationRepository;
use Modules\User\Repositories\Station\StationRepositoryInterface;
use Modules\User\Repositories\StoreUser\StoreUserRepository;
use Modules\User\Repositories\StoreUser\StoreUserRepositoryInterface;
use Modules\User\Repositories\User\UserRepositoryInterface;
use Modules\User\Repositories\User\UserRepository;
use Modules\User\Repositories\UserGroup\UserGroupRepository;
use Modules\User\Repositories\UserGroup\UserGroupRepositoryInterface;
use Modules\User\Repositories\UserStation\UserStationRepository;
use Modules\User\Repositories\UserStation\UserStationRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Khai báo cái repository ở đây
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(RoleGroupRepositoryInterface::class, RoleGroupRepository::class);
        $this->app->singleton(StationRepositoryInterface::class, StationRepository::class);
        $this->app->singleton(UserStationRepositoryInterface::class, UserStationRepository::class);
        $this->app->singleton(AdminGroupRepositoryInterface::class, AdminGroupRepository::class);
        $this->app->singleton(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->singleton(
            BrandRepositoryInterface::class,
            BrandRepository::class
        );
        $this->app->singleton(
            AdminGroupActionRepositoryInterface::class,
            AdminGroupActionRepository::class
        );
        $this->app->singleton(AdminActionRepositoryInterface::class, AdminActionRepository::class);
        $this->app->singleton(AdminMenuRepositoryInterface::class, AdminMenuRepository::class);
        $this->app->singleton(AdminGroupMapRepositoryInterface::class, AdminGroupMapRepository::class);
        $this->app->singleton(AdminHasGroupRepositoryInterface::class, AdminHasGroupRepository::class);
        $this->app->singleton(StoreUserRepositoryInterface::class, StoreUserRepository::class);
        $this->app->singleton(AdminStagingRepositoryInterface::class, AdminStagingRepository::class);
        $this->app->singleton(AdminGroupMenuRepositoryInterface::class, AdminGroupMenuRepository::class);
        $this->app->singleton(UserGroupRepositoryInterface::class, UserGroupRepository::class);
        $this->app->singleton(
            AdminMenuCategoryRepositoryInterface::class,
            AdminMenuCategoryRepository::class
        );
    }
}
