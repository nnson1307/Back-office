<?php

Route::group(
    [
        'middleware' => ['api', 'verify-api'],
        'prefix' => 'notificationapi',
        'namespace' => 'Modules\NotificationApi\Http\Controllers'
    ],
    function () {
        Route::group(['prefix' => 'notification-detail'], function () {
            Route::post('list', 'NotificationApiController@index');
            Route::post('list-noti-type', 'NotificationApiController@getNotiTypeList');
            Route::post('list-endpoint', 'NotificationApiController@getListEndPoint');
            Route::post('detail', 'NotificationApiController@getDetail');
            Route::post('detail-by-tenant-tid', 'NotificationApiController@getBrandByTenantId');
            Route::post('store', 'NotificationApiController@store');
            Route::post('store-only-detail', 'NotificationApiController@storeOnlyDetail');
            Route::post('update', 'NotificationApiController@update');
            Route::post('destroy', 'NotificationApiController@destroy');
            Route::post('update-is-actived', 'NotificationApiController@updateIsActived');
            Route::post('endpoint-json', 'NotificationApiController@getEndPointJson');
        });
        Route::group(['prefix' => 'config-notification'], function () {
            Route::post('list', 'ConfigNotificationApiController@index');
            Route::post('update-config-notification', 'ConfigNotificationApiController@updateConfigNoti');
        });
    }
);
