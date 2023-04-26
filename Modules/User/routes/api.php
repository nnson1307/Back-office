<?php
Route::group([
    'middleware' => ['api'],
    'prefix' => 'user',
    'namespace' => 'Modules\User\Http\Controllers'
], function () {
    Route::post('/get-user-by-id', 'UserController@getItemUser');
    Route::post('/search-user', 'UserController@searchUser');
});
