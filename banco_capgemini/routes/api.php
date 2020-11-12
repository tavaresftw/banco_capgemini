<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([

        'middleware' => 'api',
        'prefix' => 'auth'

    ], function ($router) {

        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');

});
Route::group([

    'middleware' => 'api',
    'prefix' => 'account'

], function ($router){

    Route::get('balance/{accountNumber}', 'AccountsController@getAccountByNumber');
    Route::post('deposit/{accountNumber}','TransactionsController@deposit');
    Route::post('withdraw/{accountNumber}','TransactionsController@withdraw');
    Route::get('list','AccountsController@getAccounts');

});