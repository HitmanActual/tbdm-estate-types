<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{

    $router->get('estate-types','EstateTypeController@index');
    $router->post('estate-types','EstateTypeController@store');
    $router->get('estate-types/{type}','EstateTypeController@show');
    $router->put('estate-types/{type}','EstateTypeController@update');
    $router->patch('estate-types/{type}','EstateTypeController@update');
    $router->delete('estate-types/{type}','EstateTypeController@destroy');
});
