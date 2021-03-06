<?php

use Illuminate\Http\Request;
use App\Models\Technology;
use App\Http\Resources\Technology as TechnologyResource;
use App\Http\Resources\TechnologyCollection;
use App\Models\Approach;
use App\Http\Resources\Approach as ApproachResource;


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

Route::get('/detail/{id}', 'TechnologyController@detail');

Route::get('/explore', function () {
    return new TechnologyCollection(Technology::all());
});

Route::get('/approach', function () {
    return new ApproachResource(Approach::all());
});