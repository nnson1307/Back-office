<?php

Route::group(['middleware' => ['web', 'permission'],
'prefix' => 'chathub', 'namespace' => 'Modules\ChatHub\Http\Controllers'], function()
{
    Route::get('/', 'ChatHubController@index')->name('chathub');
});
