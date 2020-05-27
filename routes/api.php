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

Route::group([<?php

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
    'prefix' => 'projets'
], function () {
    Route::get('list-projet/{limit}', 'ProjetController@listProjet');
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

Route::group([
    'prefix' => 'dashboard'
], function () {
    Route::post('publier-projet', 'ProjetController@publierProjet');
    Route::post('edite-projet', 'ProjetController@editerProjet');
    Route::get('liste-projet-publier', 'ProjetController@listeProjetPublier');
});

Route::group([
    'prefix' => 'categorie'
], function () {
    Route::get('liste-categorie-projet', 'CategorieProjetController@listeCategorieProjet');
    Route::post('add-categorie-projet', 'CategorieProjetController@addCategorieProjet');
    Route::post('update-categorie-projet', 'CategorieProjetController@updateCategorie');
    Route::post('delete-categorie-projet', 'CategorieProjetController@deleteCategorie');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
    });
});

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
    'prefix'=>'dashboard'
], function () {
    Route::post('publier-projet', 'ProjetController@publierProjet');
    Route::get('liste-projet-publier', 'ProjetController@listeProjetPublier');
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
