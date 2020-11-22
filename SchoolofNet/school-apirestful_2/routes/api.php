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

Route::middleware(['cors', 'auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['cors', 'auth:api'])->prefix('v1')->group(function(){
	Route::apiresources(
				[
					'products' => 'ProductsController',
					'users' => 'UsersController'
				]);
});
