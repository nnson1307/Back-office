<?php

Route::group(['middleware' => ['web'], 'prefix' => 'brandapi', 'namespace' => 'Modules\BrandApi\Http\Controllers'], function()
{
    Route::get('/', 'BrandApiController@index');
});

