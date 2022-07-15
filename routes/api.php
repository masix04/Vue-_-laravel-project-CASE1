<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
use App\Http\Controllers\Api\IndexController;

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
Route::resource('Api', \IndexController::class);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/**   Players */
/** ------------------------------------------------------------------------   */
Route::get('duplicate-players', 'Controller@getDuplicatePlayers');
Route::DELETE('delete-duplicate-players', 'Controller@deleteDuplicatePlayers');
Route::put('edit-duplicate-players', 'Controller@editDuplicatePlayers');
/** ------------------------------------------------------------------------   */

/**   Teams */
/** ------------------------------------------------------------------------   */
Route::get('duplicate-teams', 'Controller@getDuplicateTeams');
Route::DELETE('delete-duplicate-teams', 'Controller@deleteDuplicateTeams');
Route::put('edit-duplicate-teams', 'Controller@editDuplicateTeams');
/** ------------------------------------------------------------------------   */
