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

$app->get('/', function () use ($app) {
    return $app->version();
});
$app->group(['prefix'=>'api/v1'], function() use($app){
$app->get('/checklist', 'ChecklistController@index');
$app->post('/checklist', 'ChecklistController@create');
$app->get('/checklist/{id}', 'ChecklistController@show');
$app->put('/checklist/{id}', 'ChecklistController@update');
$app->delete('/checklist/{id}', 'ChecklistController@destroy');
});