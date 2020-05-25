<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([
    'prefix' => 'soumission'
], function () {
    Route::post('soumission-projet', 'MembreController@soumissionProjet');
    Route::get('list-projet-soumis', 'ProjetController@listProjetSoumis');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {

    });
});

Route::group([
    'prefix' => 'vote'
], function () {
    Route::post('vote-projet', 'VoteController@voteProjet');
    Route::get('list-vote-projet', 'ProjetController@listProjetSoumis');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
    });
});

Route::group([
    'prefix' => 'upload'
], function () {
    Route::post('upload-file', 'uploadController@uploadFile');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
    });
});
