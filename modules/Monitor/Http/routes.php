<?php

Route::group(['prefix' => 'monitor', 'namespace' => 'Modules\Monitor\Http\Controllers'], function()
{
	Route::get('/', 'MonitorController@index');
        
        Route::resource('estadoservidor', 'EstadoServidorController');
        Route::resource('estadodb', 'EstadoDbController');
        Route::resource('ambiente', 'AmbienteController');
        Route::resource('sistemaoperativo', 'SistemaOperativoController');
        Route::resource('direccionip', 'DireccionIpController');
        Route::resource('servidor', 'ServidorController');
        Route::resource('basededatos', 'BasedeDatosController');
});