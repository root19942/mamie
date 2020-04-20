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

$router->get('/', function () use ($router) {
    return "mamie API v1 contact the admin";
});

$router->group(['prefix'=>'api/v1'], function() use($router){
    $router->get('/products', 'ProductController@index');
    $router->post('/product', 'ProductController@create');
    $router->get('/product/{id}', 'ProductController@show');
    $router->put('/product/{id}', 'ProductController@update');
    $router->delete('/product/{id}', 'ProductController@destroy');


    $router->get('/recettes', 'RecetteController@index');
    $router->post('/recette', 'RecetteController@create');
    $router->get('/recette/{id}', 'RecetteController@show');
    $router->put('/recette/{id}', 'RecetteController@update');
    $router->delete('/recette/{id}', 'RecetteController@destroy');
    $router->post('/newsletter', 'NewsLetterController@store');

});
