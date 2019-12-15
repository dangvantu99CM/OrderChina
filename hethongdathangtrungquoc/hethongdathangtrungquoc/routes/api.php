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

Route::group(['prefix'=>'license'],function(){
	Route::get('downloadDB/{deviceID}/{subId}/{os}',['uses'=>'ApiLicenseController@downloadDB']);
	Route::get('downloadAssets/{deviceID}/{os}/{fileType}/{subItemId}',['uses'=>'ApiLicenseController@downloadAssets']);
	Route::get('deactive/{deviceID}/{licenseKey}',['uses'=>'ApiLicenseController@deactived']);
	Route::get('list/{deviceID}/{os}',['uses'=>'ApiLicenseController@getAll']);
	Route::get('active/{li_ac_desc}/{deviceID}/{licenseKey}/{os}',['uses'=>'ApiLicenseController@actived']);
	
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


