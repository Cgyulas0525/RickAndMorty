<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TruncateController;
use App\Http\Controllers\Api\DownloadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('api/truncateTables', [TruncateController::class, 'truncateTables']);
Route::get('api/downloadData', [DownloadController::class, 'downloadData']);



