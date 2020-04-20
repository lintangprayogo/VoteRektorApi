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

$router->group(['prefix' => 'v1', 'namespace' => 'v1'], function () use ($router) {

    $router->post('login', 'AuthController@getToken');
  

    $router->group(['middleware' => 'auth.basic'], function () use ($router) {
        $router->get('display', 'CandidateController@display');
       $router->post('nilai', 'CandidateController@nilai');
       $router->get('rata_rata', 'CandidateController@displayAvg');  
        $router->post('g1/nilai', 'CandidateController@nilaiV1');    
    });
});
