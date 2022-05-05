<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => '/api/user'], function () use ($router) {
    $router->group(['namespace' => 'Auth'], function () use ($router) {
        $router->post('/register',  'RegisterController@store');
        $router->post('/sign-in',  'AuthenticatedController@store');
        $router->post('/recover-password', 'PasswordResetLinkController@store');
        $router->patch('/recover-password', 'NewPasswordController@store');
    });

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->get('/companies',  'CompanyController@index');
        $router->post('/companies',  'CompanyController@store');
    });
});




