<?php
namespace DaiDP\StsSDK\Providers;

use DaiDP\StsSDK\HttpClient\TMClient;
use DaiDP\StsSDK\HttpClient\UMClient;
use DaiDP\StsSDK\Support\OpensslCrypt;
use DaiDP\StsSDK\SystemUserManagement\SystemUserManagement;
use DaiDP\StsSDK\SystemUserManagement\SystemUserManagementInterface;
use DaiDP\StsSDK\TenantManagement\TenantManagement;
use DaiDP\StsSDK\TenantManagement\TenantManagementInterface;
use DaiDP\StsSDK\TenantUserManagement\TenantUserManagement;
use DaiDP\StsSDK\TenantUserManagement\TenantUserManagementInterface;
use DaiDP\StsSDK\UserManagement\UserManagement;
use DaiDP\StsSDK\UserManagement\UserManagementInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class StsServiceProvider
 * @package DaiDP\StsSDK\Providers
 * @author DaiDP
 * @since Sep, 2019
 */
class StsServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../../config/config.php');

        $this->publishes([$path => config_path('sts.php')], 'config');
        $this->mergeConfigFrom($path, 'sts');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerUserManagementClient();
        $this->registerSystemUserManagementClient();
        $this->registerTenantManagementClient();
        $this->registerTenantUserManagementClient();
        $this->registerOpenSSLCrypt();

        $this->app->singleton(UserManagementInterface::class, UserManagement::class);
        $this->app->singleton(SystemUserManagementInterface::class, SystemUserManagement::class);
        $this->app->singleton(TenantManagementInterface::class, TenantManagement::class);
        $this->app->singleton(TenantUserManagementInterface::class, TenantUserManagement::class);
    }

    /**
     * Đăng ký User management
     */
    protected function registerUserManagementClient()
    {
        $this->app->singleton('daidp.sts.user_client', function () {
            return new UMClient($this->config('user_management'));
        });
    }

    /**
     * Đăng ký User management
     */
    protected function registerSystemUserManagementClient()
    {
        $this->app->singleton('daidp.sts.sys_user_client', function () {
            return new UMClient($this->config('system_user_management'));
        });
    }

    /**
     * Đăng ký Tenant management
     */
    protected function registerTenantManagementClient()
    {
        $this->app->singleton('daidp.sts.tenant_client', function () {
            return new TMClient($this->config('tenant_management'));
        });
    }

    /**
     * Đăng ký Tenant User management
     */
    protected function registerTenantUserManagementClient()
    {
        $this->app->singleton('daidp.sts.tenant_user_client', function () {
            return new UMClient($this->config('tenant_user_management'));
        });
    }

    /**
     * Đăng ký OpenSSL Crypt
     */
    protected function registerOpenSSLCrypt()
    {
        $this->app->singleton('daidp.sts.openssl_crypt', function () {
            $config = $this->config('openssl');
            return new OpensslCrypt($config['secret_key'], $config['salt']);
        });
    }

    /**
     * Helper to get the config values.
     *
     * @param  string  $key
     * @param  string  $default
     *
     * @return mixed
     */
    protected function config($key, $default = null)
    {
        return config("sts.$key", $default);
    }
}