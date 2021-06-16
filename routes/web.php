<?php
use Peru\Jne\DniFactory;
use Peru\Sunat\RucFactory;

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
    return $router->app->version();
});

$router->get('/dni/{dni}',function($dni){
    $factory = new DniFactory();
    $cs = $factory->create();
    $person = $cs->get($dni);
    if (!$person) {
        echo 'Not found';
        return;
    }
    return response()->json($person);
});
$router->get('/ruc/{ruc}',function($ruc){
    $factory = new RucFactory();
    $cs = $factory->create();

    $company = $cs->get($ruc);
    if (!$company) {
        echo 'Not found';
        return;
    }

    return response()->json($company);

});
