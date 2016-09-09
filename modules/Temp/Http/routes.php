<?php

Route::group(['prefix' => 'temp', 'namespace' => 'Modules\Temp\Http\Controllers'], function()
{
	Route::get('/', 'TempController@index');
});