<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChartDataController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::apiResource('users', UserController::class);

    Route::apiResource('configs', ConfigController::class)->only(['update']);

    Route::apiResource('charts', ChartController::class)->except(['index']);

    Route::apiResource('charts.chart-datas', ChartDataController::class)->shallow();

    Route::apiResource('files', FilesController::class)->except(['show', 'update']);

    Route::put('media/{media}/attach', [MediaController::class, 'attach']);
});


Route::post('login', [UserController::class, 'login']);

Route::get('files/{file}', [FilesController::class, 'show']);

Route::get('configs/{config}', [ConfigController::class, 'show']);

Route::get('charts', [ChartController::class, 'index']);
