<?php

use App\Http\Controllers\FileImportsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FileImportsController::class, 'index']);

Route::post('/import', [FileImportsController::class, 'import'])->name('import');

