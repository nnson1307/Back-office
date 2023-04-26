<?php

Route::group(
    ['middleware' => ['web', 'auth', 'permission'],
    'prefix' => 'user',
    'namespace' => 'Modules\User\Http\Controllers'],
    function () {
        // Admin Group
        Route::group(['prefix' => 'admin-group'], function () {
            Route::get('/', 'AdminGroupController@index')->name('user.admin-group.index');
            Route::get('create', 'AdminGroupController@create')->name('user.admin-group.create');
            Route::post('store', 'AdminGroupController@store')->name('user.admin-group.store');
            Route::get('show/{id}', 'AdminGroupController@show')
                ->name('user.admin-group.show')
                ->where('id', '[0-9]+');
            Route::get('edit/{id}', 'AdminGroupController@edit')
                ->name('user.admin-group.edit')
                ->where('id', '[0-9]+');
            Route::post('update', 'AdminGroupController@update')->name('user.admin-group.update');
            Route::post('destroy', 'AdminGroupController@destroy')->name('user.admin-group.destroy');
            Route::get('add-user-into-group/{group_id}', 'AdminGroupController@addUserIntoGroup')
                ->name('user.admin-group.add-user-into-group')
                ->where('group_id', '[0-9]+');
            Route::post('submit-add-user-into-group', 'AdminGroupController@submitAddUserIntoGroup')
                ->name('user.admin-group.submit-add-user-into-group');

            Route::post('get-list-child', 'AdminGroupController@getListGroupChild')
                ->name('user.admin-group.get-list-child');
            Route::post('add-collection-list-child', 'AdminGroupController@addCollectionListGroupChild')
                ->name('user.admin-group.add-collection-list-child');

            Route::post('get-list-user', 'AdminGroupController@getListUser')->name('user.admin-group.get-list-user');
            Route::post('add-collection-list-user', 'AdminGroupController@addCollectionListUser')
                ->name('user.admin-group.add-collection-list-user');

            Route::post('get-list-menu', 'AdminGroupController@getListMenu')->name('user.admin-group.get-list-menu');
            Route::post('add-collection-list-menu', 'AdminGroupController@addCollectionListMenu')
                ->name('user.admin-group.add-collection-list-menu');

            Route::post('get-list-action', 'AdminGroupController@getListAction')
                ->name('user.admin-group.get-list-action');
            Route::post('add-collection-list-action', 'AdminGroupController@addCollectionListAction')
                ->name('user.admin-group.add-collection-list-action');
        });

        // Admin Menu
        Route::group(['prefix' => 'admin-menu'], function () {
            Route::get('/', 'AdminMenuController@index')->name('user.admin-menu.index');
            Route::get('create', 'AdminMenuController@create')->name('user.admin-menu.create');
            Route::post('store', 'AdminMenuController@store')->name('user.admin-menu.store');
            Route::get('edit/{id}', 'AdminMenuController@edit')
                ->name('user.admin-menu.edit')
                ->where('id', '[0-9]+');
            Route::post('update', 'AdminMenuController@update')->name('user.admin-menu.update');
            Route::post('destroy', 'AdminMenuController@destroy')->name('user.admin-menu.destroy');
            Route::post('get-list-group', 'AdminMenuController@getListGroup')->name('user.admin-menu.get-list-group');
            Route::post('add-collection-list', 'AdminMenuController@addCollectionList')
                ->name('user.admin-menu.add-collection-list');
            Route::get('show/{id}', 'AdminMenuController@show')
                ->name('user.admin-menu.show')
                ->where('id', '[0-9]+');
        });

        // Admin Group Action
        Route::group(['prefix' => 'admin-group-action'], function () {
            Route::get('/', 'AdminGroupActionController@index')->name('user.admin-group-action.index');
            Route::get('edit/{id}', 'AdminGroupActionController@edit')
                ->name('user.admin-group-action.edit')
                ->where('id', '[0-9]+');
            Route::post('update', 'AdminGroupActionController@update')->name('user.admin-group-action.update');
            Route::get('show/{id}', 'AdminGroupActionController@show')
                ->name('user.admin-group-action.show')
                ->where('id', '[0-9]+');
            Route::post('get-list-group', 'AdminGroupActionController@getListGroup')
                ->name('user.admin-group-action.get-list-group');
            Route::post('add-collection-list-group', 'AdminGroupActionController@addCollectionListGroup')
                ->name('user.admin-group-action.add-collection-list-group');
        });

        // Admin Menu Category
        Route::group(['prefix' => 'admin-menu-category'], function () {
            Route::get('/', 'AdminMenuCategoryController@index')->name('user.admin-menu-category.index');
            Route::get('create', 'AdminMenuCategoryController@create')->name('user.admin-menu-category.create');
            Route::post('store', 'AdminMenuCategoryController@store')->name('user.admin-menu-category.store');
            Route::get('show/{id}', 'AdminMenuCategoryController@show')
                ->name('user.admin-menu-category.show')
                ->where('id', '[0-9]+');
            Route::get('edit/{id}', 'AdminMenuCategoryController@edit')
                ->name('user.admin-menu-category.edit')
                ->where('id', '[0-9]+');
            Route::post('update', 'AdminMenuCategoryController@update')->name('user.admin-menu-category.update');
            Route::post('destroy', 'AdminMenuCategoryController@destroy')->name('user.admin-menu-category.destroy');
        });

        //My store
        Route::group(['prefix' => 'my-store'], function () {
            Route::get('/', 'IndexController@index')->name('user.my-store');
            Route::get('/create', 'IndexController@create')->name('user.my-store.create');
            Route::post('/store', 'IndexController@store')->name('user.my-store.store');
//            Route::get('destroy/{id}', 'IndexController@destroy')->name('user.my-store.destroy');
            Route::get('edit/{id}', 'IndexController@edit')->name('user.my-store.edit');
            Route::post('edit', 'IndexController@update')->name('user.my-store.update');
            Route::post('change-status', 'IndexController@changeStatusMyStoreUserAction')
                ->name('user.my-store.change-status');
            Route::post('/show-reset-password', 'IndexController@showResetPassword')
                ->name('user.my-store.show-reset-password');
            Route::post('/update-password', 'IndexController@updatePassword')
                ->name('user.my-store.update-password');
            Route::post('get-list-child', 'IndexController@getListGroupChild')
                ->name('user.my-store.get-list-child');
            Route::post('/add-collection-list-child', 'IndexController@addCollectionListGroupChild')
                ->name('user.my-store.add-collection-list-child');
        });

        Route::group(['prefix' => 'store-user'], function () {
            // trang index
            Route::get('/', 'StoreUserController@index')->name('user.store-user');
            // show trang tạo store user
            Route::get('create', 'StoreUserController@create')->name('user.store-user.create');
            // đăng kí tài khoản store user
            Route::post('store', 'StoreUserController@store')->name('user.store-user.store');
            // show trang sửa tài khoản
            Route::get('edit/{id}', 'StoreUserController@edit')->name('user.store-user.edit');
            // cập nhật tài khoản store user
            Route::post('update', 'StoreUserController@update')->name('user.store-user.update');
            // xóa tài khoản store user
            Route::post('destroy', 'StoreUserController@destroy')->name('user.store-user.destroy');
            // cập nhật trạng thái tài khoản
            Route::post('update-status', 'StoreUserController@updateStatus')->name('user.store-user.update-status');
            // show popup đổi mật khẩu
            Route::post('/show-reset-password', 'StoreUserController@showResetPassword')
                ->name('user.store-user.show-reset-password');
            // Đổi mật khẩu tài khoản store user
            Route::post('/reset-password', 'StoreUserController@resetPassword')
                ->name('user.store-user.reset-password');
            // show trang thông tin tài khoản
            Route::get('detail/{id}', 'StoreUserController@detail')->name('user.store-user.detail');
        });
        Route::group(['prefix' => 'user-group-notification'], function () {
            Route::get('/', 'UserGroupNotificationController@index')->name('user.user-group-notification');
            Route::get('/create-auto', 'UserGroupNotificationController@createAuto')
                ->name('user.user-group-notification.create-auto');
            Route::get('/create-user-define', 'UserGroupNotificationController@createUserDefine')
                ->name('user.user-group-notification.create-user-define');
            Route::post('/search-all-user', 'UserGroupNotificationController@searchAllUser')
                ->name('user.user-group-notification.search-all-user');
            Route::post('/get-condition', 'UserGroupNotificationController@getCondition')
                ->name('user.user-group-notification.get-condition');
            Route::post('/get-user-group', 'UserGroupNotificationController@getUserGroup')
                ->name('user.user-group-notification.get-user-group');
            Route::post('/store-auto', 'UserGroupNotificationController@storeAuto')
                ->name('user.user-group-notification.store-auto');
            Route::get('/export-excel-examle', 'UserGroupNotificationController@exportExcelExample')
                ->name('user.user-group-notification.export-excel-examle');
            Route::post('/read-excel', 'UserGroupNotificationController@importExcel')
                ->name('user.user-group-notification.read-excel');
            Route::get('/edit-auto/{id}', 'UserGroupNotificationController@editAuto')
                ->name('user.user-group-notification.edit-auto');
            Route::post('/update-auto', 'UserGroupNotificationController@updateAuto')
                ->name('user.user-group-notification.update-auto');
            Route::post('/search-where-in-user', 'UserGroupNotificationController@searchWhereInUser')
                ->name('user.user-group-notification.search-where-in-user');
            Route::post('/add-user-group-define', 'UserGroupNotificationController@addUserGroupDefine')
                ->name('user.user-group-notification.add-user-group-define');
            Route::post('/store-user-define', 'UserGroupNotificationController@storeUserGroupDefine')
                ->name('user.user-group-notification.store-user-define');
            Route::get('/edit-user-define/{id}', 'UserGroupNotificationController@editUserDefine')
                ->name('user.user-group-notification.edit-user-define');
            Route::post('/get-user-by-group-define', 'UserGroupNotificationController@getUserByGroupDefine')
                ->name('user.user-group-notification.get-user-by-group-define');
            Route::post('/update-user-define', 'UserGroupNotificationController@updateUserGroupDefine')
                ->name('user.user-group-notification.update-user-define');
            Route::post('/compute-user-in-user-group-auto',
                'UserGroupNotificationController@computeUserInUserGroupAuto')
                ->name('user.user-group-notification.compute-user-in-user-group-auto');
            Route::get('/detail-auto/{id}', 'UserGroupNotificationController@detailAuto')
                ->name('user.user-group-notification.detail-auto');
            Route::get('/detail-define/{id}', 'UserGroupNotificationController@detailUserDefine')
                ->name('user.user-group-notification.detail-define');
        });
        Route::get('validation', function () {
            return trans('user::validation');
        })->name('user.validation');
    }
);


Route::group(
    ['middleware' => ['web'],
    'namespace' => 'Modules\User\Http\Controllers'],
    function () {
        Route::match(['get'], '/login', 'LoginController@indexAction')
            ->name('login');
        Route::match(['get'], '/logout', 'LoginController@logoutAction')
            ->name('logout');
        Route::post('/login', 'LoginController@postLogin')
            ->name('login');

        Route::get('change-password-first', 'LoginController@changePasswordFirst')->name('change-password-first');
        Route::post('change-password-first', 'LoginController@postChangePassword')
            ->name('change-password-first');

        //reset password
        Route::post('/send-mail-reset-password', 'ForgetPasswordController@sendMailResetPasswordAction')
            ->name('send-mail-reset-password');
        Route::get('/reset-password/{token}', 'ForgetPasswordController@resetPasswordAction')
            ->name('reset-password');
        Route::post('/submit-reset-password', 'ForgetPasswordController@submitResetPasswordAction')
            ->name('submit-reset-password');

        //form login two factor authen
        Route::get('login-two-factory', 'LoginController@twoLoginFactorAuthAction')
            ->name('two-factory-auth');
        Route::post('submit-login-two-factory', 'LoginController@submitLoginFactorAuthAction')
            ->name('submit-two-factory-auth');
        Route::get('locale/{locale}', function ($locale) {
            Session::put('locale', $locale);
            return redirect()->back();
        });
        Route::get('lang/{lang}', 'LangController@changeLang')->name('lang');

        Route::get('error-404', function () {
            return view('errors.error-404');
        })->name('error-404');
        Route::get('error-403', function () {
            return view('errors.error-403');
        })->name('error-403');
        Route::get('nothing', function () {
            return view('errors.blank');
        })->name('nothing');

        Route::get('user/login/validation', function () {
            return trans('validation');
        })->name('user.login.validation');

        Route::post('/send-mail-reset-password', 'ForgetPasswordController@sendEmailResetPassword')
            ->name('send-mail-reset-password');
        Route::get('/reset-password/{token}', 'ForgetPasswordController@resetPassword')->name('reset-password');

        Route::get('forget-password', 'ForgetPasswordController@index')
            ->name('user.forget-password');
        Route::post('send-email-reset-password', 'ForgetPasswordController@sendEmailResetPassword')
            ->name('user.forget-password.send-email-reset-password');
        Route::post('/submit-reset-password', 'ForgetPasswordController@submitResetPassword')
            ->name('user.forget-password.submit-reset-password');
        Route::get('/forget-password-success', 'ForgetPasswordController@forgetPasswordSuccess')
            ->name('user.forget-password.forget-password-success');
        Route::get('validation', function () {
            return trans('user::validation');
        })->name('user.validation2');
    }
);

