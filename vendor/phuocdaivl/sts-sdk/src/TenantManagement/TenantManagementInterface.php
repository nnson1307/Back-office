<?php
namespace DaiDP\StsSDK\TenantManagement;

use DaiDP\StsSDK\HttpClient\ReponseData;

/**
 * Interface TenantManagementInterface
 * @package DaiDP\TenantManagement
 * @author DaiDP
 * @since Sep, 2019
 */
interface TenantManagementInterface
{
    /**
     * Get list connection string
     *
     * @param $serviceName
     * @return ReponseData
     */
    public function getConnectionStrings($serviceName = 'RetailProBrand');

    /**
     * Create tenant
     *
     * @param $name
     * @return ReponseData
     */
    public function createTenant($name);

    /**
     * Create connection string for tenant
     *
     * @param $idTenant
     * @param $connectionString
     * @param string $domain
     * @param string $service
     * @return ReponseData
     */
    public function createConnectionString($idTenant, $connectionString, $domain = 'RetailPro', $service = 'RetailProBrand');
}
