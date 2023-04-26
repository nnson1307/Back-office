<?php
//comment
Route::group(
    ['middleware' => ['web', 'auth', 'permission'],
        'prefix' => 'admin',
        'namespace' => 'Modules\Admin\Http\Controllers'],
    function () {
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', 'DashboardController@indexAction')->name('admin.dashboard');
        });
        Route::group(['prefix' => 'country'], function () {
            Route::get('/', 'CountryController@index')->name('admin.country');
            Route::get('create', 'CountryController@create')->name('admin.country.create');
            Route::post('store', 'CountryController@store')->name('admin.country.store');
            Route::get('edit/{id}', 'CountryController@edit')->name('admin.country.edit');
            Route::post('update', 'CountryController@update')->name('admin.country.update');
            Route::post('destroy', 'CountryController@destroy')->name('admin.country.destroy');
            Route::post('change-status', 'CountryController@changeStatusAction')->name('admin.country.change-status');
            Route::get('detail/{id}', 'CountryController@detail')->name('admin.country.detail');
        });

        Route::group(['prefix' => 'province'], function () {
            Route::get('/', 'ProvinceController@index')->name('admin.province');
            Route::get('create', 'ProvinceController@create')->name('admin.province.create');
            Route::post('store', 'ProvinceController@store')->name('admin.province.store');
            Route::get('edit/{id}', 'ProvinceController@edit')->name('admin.province.edit');
            Route::post('update', 'ProvinceController@update')->name('admin.province.update');
            Route::post('destroy', 'ProvinceController@destroy')->name('admin.province.destroy');
            Route::post('change-status', 'ProvinceController@changeStatusAction')->name('admin.province.change-status');
            Route::get('detail/{id}', 'ProvinceController@detail')->name('admin.province.detail');
        });

        Route::group(['prefix' => 'district'], function () {
            Route::get('/', 'DistrictController@index')->name('admin.district');
            Route::get('create', 'DistrictController@create')->name('admin.district.create');
            Route::post('store', 'DistrictController@store')->name('admin.district.store');
            Route::get('edit/{id}', 'DistrictController@edit')->name('admin.district.edit');
            Route::post('update', 'DistrictController@update')->name('admin.district.update');
            Route::post('destroy', 'DistrictController@destroy')->name('admin.district.destroy');
            Route::post('change-status', 'DistrictController@changeStatusAction')->name('admin.district.change-status');
            Route::get('detail/{id}', 'DistrictController@detail')->name('admin.district.detail');
        });

        Route::group(['prefix' => 'ward'], function () {
            Route::get('/', 'WardController@index')->name('admin.ward');
            Route::get('create', 'WardController@create')->name('admin.ward.create');
            Route::post('store', 'WardController@store')->name('admin.ward.store');
            Route::get('edit/{id}', 'WardController@edit')->name('admin.ward.edit');
            Route::post('update', 'WardController@update')->name('admin.ward.update');
            Route::post('destroy', 'WardController@destroy')->name('admin.ward.destroy');
            Route::post('change-status', 'WardController@changeStatusAction')->name('admin.ward.change-status');
            Route::get('detail/{id}', 'WardController@detail')->name('admin.ward.detail');
        });

        Route::group(['prefix' => 'brand'], function () {
            Route::get('/', 'BrandController@index')->name('admin.brand');
            Route::get('create', 'BrandController@create')->name('admin.brand.create');
            Route::post('upload', 'BrandController@uploadAction')->name('admin.brand.upload');
            Route::post('store', 'BrandController@store')->name('admin.brand.store');
            Route::get('edit/{id}', 'BrandController@edit')->name('admin.brand.edit');
            Route::post('update', 'BrandController@update')->name('admin.brand.update');
            Route::post('destroy', 'BrandController@destroy')->name('admin.brand.destroy');
            Route::get('/adduseradmin', 'BrandController@userAdminAdd')->name('admin.brand.useradminadd');
            Route::post('/adduseradmin', 'BrandController@submitUserAdminAdd')->name('admin.brand.useradminadd');
            Route::get('/getlistuseradmin', 'BrandController@getListUserAdmin')->name('admin.brand.getlistuseradmin');
            Route::post('deleteuseradmin', 'BrandController@removeUser')->name('admin.brand.deleteuseradmin');
            Route::post('activeuseradmin', 'BrandController@activeUser')->name('admin.brand.activeuseradmin');
            Route::get('/changepassuseradmin', 'BrandController@userAdminChangePass')
                ->name('admin.brand.changepassuseradmin');
            Route::post('update-status', 'BrandController@updateStatus')->name('admin.brand.update-status');
            Route::post('update-publish', 'BrandController@updatePublish')->name('admin.brand.update-publish');
            Route::get('detail/{id}', 'BrandController@detail')->name('admin.brand.detail');
            Route::post('show-model', 'BrandController@showModel')->name('admin.brand.showModel');
            Route::post('store-service', 'BrandController@storeService')->name('admin.brand.store-service');
            Route::post('list-service', 'BrandController@listService')->name('admin.brand.list-service');
            Route::post('destroy-feature', 'BrandController@destroyFeature')->name('admin.brand.destroy-feature');
            //Show pop qr code
            Route::post('pop-qr-code', 'BrandController@showPopQrCodeAction')->name('admin.brand.show-pop-qr-code');
        });

        // FAQ Group
        Route::group(['prefix' => 'faq-group'], function () {
            Route::get('/', 'FaqGroupController@index')->name('admin.faq-group.index');
            Route::get('show/{id}', 'FaqGroupController@show')
                ->name('admin.faq-group.show')
                ->where('id', '[0-9]+');
            Route::get('create', 'FaqGroupController@create')->name('admin.faq-group.create');
            Route::post('store', 'FaqGroupController@store')->name('admin.faq-group.store');
            Route::get('edit/{id}', 'FaqGroupController@edit')->name('admin.faq-group.edit')->where('id', '[0-9]+');
            Route::post('update', 'FaqGroupController@update')->name('admin.faq-group.update');
            Route::post('destroy', 'FaqGroupController@destroy')->name('admin.faq-group.destroy');
            Route::post('update-status', 'FaqGroupController@updateStatus')->name('admin.faq-group.update-status');
        });

        // FAQ
        Route::group(['prefix' => 'faq'], function () {
            Route::get('/', 'FaqController@index')->name('admin.faq.index');
            Route::get('show/{id}', 'FaqController@show')
                ->name('admin.faq.show')
                ->where('id', '[0-9]+');
            Route::get('create', 'FaqController@create')->name('admin.faq.create');
            Route::post('store', 'FaqController@store')->name('admin.faq.store');
            Route::get('edit/{id}', 'FaqController@edit')->name('admin.faq.edit')->where('id', '[0-9]+');
            Route::post('update', 'FaqController@update')->name('admin.faq.update');
            Route::post('destroy', 'FaqController@destroy')->name('admin.faq.destroy');
            Route::post('update-status', 'FaqController@updateStatus')->name('admin.faq.update-status');
        });

        // Policy Terms
        Route::group(['prefix' => 'policy-terms'], function () {
            Route::get('/', 'PolicyTermsController@index')->name('admin.policy-terms.index');
            Route::get('show/{id}', 'PolicyTermsController@show')
                ->name('admin.policy-terms.show')
                ->where('id', '[0-9]+');
            Route::get('create', 'PolicyTermsController@create')->name('admin.policy-terms.create');
            Route::post('store', 'PolicyTermsController@store')->name('admin.policy-terms.store');
            Route::get('edit/{id}', 'PolicyTermsController@edit')
                ->name('admin.policy-terms.edit')
                ->where('id', '[0-9]+');
            Route::post('update', 'PolicyTermsController@update')->name('admin.policy-terms.update');
            Route::post('destroy', 'PolicyTermsController@destroy')->name('admin.policy-terms.destroy');
        });

        Route::get('lang-country', function () {
            return trans('admin::country');
        });
        Route::get('lang-province', function () {
            return trans('admin::province');
        });
        Route::get('lang-district', function () {
            return trans('admin::district');
        });
        Route::get('lang-ward', function () {
            return trans('admin::ward');
        });

        Route::get('validation', function () {
            return trans('admin::validation');
        })->name('admin.validation');

        Route::post('change-country', 'DistrictController@changeCountryAction')->name('change-country');
        Route::post('change-province', 'WardController@changeProvinceAction')->name('change-province');

        Route::group(['prefix' => 'notification'], function () {
            Route::get('/', 'NotificationController@index')->name('admin.notification');
            Route::post('update-is-actived/{id}', 'NotificationController@updateIsActived')
                ->name('admin.notification.updateIsActived');
            Route::get('create', 'NotificationController@create')->name('admin.notification.create');
            Route::post('store', 'NotificationController@store')->name('admin.notification.store');
            Route::get('edit/{id}', 'NotificationController@edit')->name('admin.notification.edit');
            Route::get('show/{id}', 'NotificationController@detail')->name('admin.notification.detail');
            Route::post('update/{id}', 'NotificationController@update')->name('admin.notification.update');
            Route::post('/upload', 'NotificationController@upload')->name('admin.notification.upload');
            Route::get('/ajax-detail-end-point', 'NotificationController@detailEndPoint')
                ->name('admin.notification.detailEndPoint');
            Route::post('delete/{id}', 'NotificationController@destroy')->name('admin.notification.destroy');
            Route::get('/ajax-group', 'NotificationController@groupList')
                ->name('admin.notification.groupList');
        });

        //config notification
        Route::group(['prefix' => 'config-notification'], function () {
            Route::get('/', 'ConfigNotificationController@getIndex')
                ->name('admin.config-notification');
            Route::post('/update', 'ConfigNotificationController@update')
                ->name('admin.config-notification.update');
        });

        Route::post('upload-img-summernote', 'UploadImgController@upload')->name('admin.upload-img-summernote');

        Route::group(['prefix' => 'feedback'], function () {
            //            Route answer
            Route::get('/list-answer', 'FormController@indexAnswer')->name('page.form.answer');
            Route::get('answer/show/{form_id}/{user_id}', 'FormController@showAnswer')->name('page.form.answer.show');
            //            Route Question
            Route::get('/list-question', 'FormController@indexQuestion')->name('page.form.question');
            Route::get('/create-question', 'FormController@createQuestion')->name('page.form.question.create');
            Route::post('/create-question-post', 'FormController@createQuestionPost')
                ->name('page.form.question.create.post');
            Route::get('/edit-question/{idQuestion}', 'FormController@editQuestion')->name('page.form.question.edit');
            Route::post('/edit-question-post', 'FormController@editQuestionPost')->name('page.form.question.edit.post');

            //          Route Form
            Route::get('/list-form', 'FormController@indexForm')->name('page.form.form');
            Route::get('/create-form', 'FormController@createForm')->name('page.form.form.create');
            Route::post('/create-form-post', 'FormController@createFormPost')->name('page.form.form.create.post');
            Route::get('/edit-form/{idForm}', 'FormController@editForm')->name('page.form.form.edit');
            Route::post('/edit-form-post', 'FormController@editFormPost')->name('page.form.form.edit.post');
        });

        Route::get('validation', function () {
            return trans('admin::validation');
        })->name('admin.validation');

        Route::group(['prefix', 'profile'], function () {
            Route::get('profile', 'ProfileController@profileAction')->name('admin.profile');
            Route::post('upload-avatar', 'ProfileController@uploadAvatarAction')
                ->name('admin.profile.upload-avatar');
            Route::post('edit-profile', 'ProfileController@editProfileAction')
                ->name('admin.profile.edit-profile');
            Route::get('change-password', 'ProfileController@changePasswordAction')
                ->name('admin.profile.change-password');
            Route::post('submit-change-pass', 'ProfileController@submitChangePassAction')
                ->name('admin.profile.submit-change-pass');
        });

        Route::post('upload-image', 'UploadController@uploadImageAction')->name('admin.upload-image');
    }
);
