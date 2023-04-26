<?php
//comment
Route::group(
    ['middleware' => ['web', 'auth', 'permission'],
        'prefix' => 'service',
        'namespace' => 'Modules\Service\Http\Controllers'],
    function () {
        Route::group(['prefix' => 'service'], function () {
            Route::get('/', 'ServiceController@index')->name('admin.service');
            Route::get('create', 'ServiceController@create')->name('admin.service.create');
            Route::post('store', 'ServiceController@store')->name('admin.service.store');
            Route::get('edit/{id}', 'ServiceController@edit')->name('admin.service.edit');
            Route::post('update', 'ServiceController@update')->name('admin.service.update');
            Route::post('destroy', 'ServiceController@destroy')->name('admin.service.destroy');
            Route::post('change-status', 'ServiceController@changeStatusAction')->name('admin.service.change-status');
            Route::get('show/{id}', 'ServiceController@detail')->name('admin.service.show');
            Route::post('show-modal', 'ServiceController@showModalFeature')->name('admin.service.show-modal');
            Route::post('store-feature', 'ServiceController@storeFeatureService')->name('admin.service.store-feature');
            Route::post('store-feature-child', 'ServiceController@storeFeatureChildService')->name('admin.service.store-feature-child');
            Route::post('show-popup-edit', 'ServiceController@showPopupEditFeature')
                ->name('admin.service.show-popup-edit');
            Route::post('update-feature', 'ServiceController@updateFeatureService')
                ->name('admin.service.update-feature');
            Route::post('destroy-feature', 'ServiceController@destroyFeature')->name('admin.service.destroy-feature');
            Route::post('list-feature', 'ServiceController@listFeature')->name('admin.service.list-feature');
            Route::post('list-feature-child', 'ServiceController@listFeatureChild')->name('admin.service.modal-feature-child');
            Route::post('change-status-feature', 'ServiceController@changeStatusFeature')
                ->name('admin.service.change-status-feature');
        });

        Route::group(['prefix' => 'service-feature'], function () {
            Route::get('/', 'ServiceFeatureController@index')->name('service.service-feature.index');
            Route::get('/show/{id}', 'ServiceFeatureController@show')->name('service.service-feature.show');
            Route::get('/edit/{id}', 'ServiceFeatureController@edit')->name('service.service-feature.edit');
            Route::post('/edit', 'ServiceFeatureController@editPost')->name('service.service-feature.editPost');
        });

        Route::get('validation', function () {
            return trans('service::validation');
        })->name('admin.service.validation');
    }
);
