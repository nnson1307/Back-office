<?php
Route::group(['middleware' => ['api', 'verify-api'], 'prefix' => 'brandapi', 'namespace' => 'Modules\BrandApi\Http\Controllers'], function () {
    Route::post('/list', 'BrandApiController@index');
    Route::post('/get-my-store-detail', 'BrandSubscriptionController@getMyStoreDetail');
    Route::post('option-province', 'AddressController@getProvinceAction');
    Route::post('option-province-country', 'AddressController@getProvinceCountryAction');
    Route::post('option-province-area', 'AddressController@getProvinceAreaAction');
    Route::post('option-district', 'AddressController@getDistrictAction');
    Route::post('option-ward', 'AddressController@getWardAction');
    Route::post('option-country', 'AddressController@getCountryAction');
    Route::get('/list', 'BrandApiController@index');
    Route::post('/update-brand', 'BrandApiController@updateBrand');
    Route::post('/check-update-brand', 'BrandApiController@checkUpdateBrand');
    Route::group(['prefix' => 'store'], function () {
        Route::post('/get-my-store-detail', 'BrandSubscriptionController@getMyStoreDetail');
        Route::post('/delete-connect-my-store', 'BrandSubscriptionController@deleteConnectMyStore');
        Route::post('/search-store', 'StoreController@searchStore');
        Route::post('/filter-store', 'StoreController@filterStore');
        Route::post('/update-brand-sub', 'BrandSubscriptionController@updateBrandSub');
        Route::post('/add-brand-sub-history', 'BrandSubscriptionController@addBrandSubHistory');
        Route::post('/get-detail-brand-sub', 'BrandSubscriptionController@getDetailBrandSub');
        Route::post('/get-detail-brand-sub-by-code', 'BrandSubscriptionController@getBrandSubDetailByCode');
    });
    Route::group(['prefix' => 'brand'], function () {
        Route::post('/search-brand', 'BrandApiController@search');
        Route::post('get-config', 'BrandApiController@getConfig');
        Route::post('update-config', 'BrandApiController@updateConfig');
        Route::post('store-config', 'BrandApiController@storeConfig');
        Route::post('get-brand', 'BrandApiController@getBrand');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::post('/search', 'UserController@search');
    });

    // Store Group
    Route::group(['prefix' => 'store-group'], function () {
        Route::post('/', 'StoreGroupController@index');
        Route::post('get-option', 'StoreGroupController@getOption');
        Route::post('add-auto', 'StoreGroupController@storeAuto');
        Route::post('add-define', 'StoreGroupController@storeDefine');
        Route::post('detail', 'StoreGroupController@getDetail');
        Route::post('store-group-detail', 'StoreGroupController@getStoreGroupDetail');
        Route::post('update-auto', 'StoreGroupController@editAuto');
        Route::post('detail-define', 'StoreGroupController@getDetailDefine');
        Route::post('update-define', 'StoreGroupController@editDefine');
        Route::post('get-list-store-by-tenant', 'StoreGroupController@getListStore');
        Route::post('get-phone-list-by-data-excel', 'StoreGroupController@checkExcel');
        Route::post('get-my-store-detail', 'StoreGroupController@getMyStoreDetail');
        Route::post('get-all-store', 'StoreGroupController@getAllStore');
        Route::post('get-store-group', 'StoreGroupController@getStoreGroup');
    });

    Route::group(['prefix' => 'country'], function () {
        Route::post('/', 'CountryController@getCountries');
        Route::post('detail', 'CountryController@getDetail');
        Route::post('check-country', 'CountryController@checkCountry');
        Route::post('check-address', 'CountryController@checkAddress');
    });

    Route::group(['prefix' => 'province'], function () {
        Route::post('/', 'ProvinceController@getProvinces');
        Route::post('detail', 'ProvinceController@getDetail');
        Route::post('check-province', 'ProvinceController@checkProvince');
    });

    Route::group(['prefix' => 'district'], function () {
        Route::post('/', 'DistrictController@getDistricts');
        Route::post('detail', 'DistrictController@getDetail');
        Route::post('check-district', 'DistrictController@checkDistrict');
    });

    Route::group(['prefix' => 'ward'], function () {
        Route::post('/', 'WardController@getWards');
        Route::post('detail', 'WardController@getDetail');
        Route::post('check-ward', 'WardController@checkWard');
    });

    Route::group(['prefix' => 'store-require'], function () {
        Route::post('/', 'StoreController@storeRequireConnect');
    });

    Route::group(['prefix' => 'service'], function () {
        Route::post('/', 'ServiceApiController@index');
        Route::post('/detail', 'ServiceApiController@detail');
        Route::post('/feature/detail', 'ServiceApiController@detailFeature');
    });

    Route::group(['prefix' => 'campaign-sampling'], function () {
        Route::post('/', 'CampaignSamplingController@getCampaignSamplings');
        Route::post('store', 'CampaignSamplingController@store');
        Route::post('store-product', "CampaignSamplingController@storeProduct");
        Route::post('detail', 'CampaignSamplingController@getDetail');
        Route::post('update', "CampaignSamplingController@update");
        Route::post('update-product', 'CampaignSamplingController@updateProduct');
    });


});
