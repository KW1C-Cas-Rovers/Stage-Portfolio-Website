<?php

use App\Http\Controllers\MainSiteController;
use Modules\Pages\app\Http\Controllers\PagesFrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::middleware('web')->group(function () {
//    Route::get('{slug}', [PagesFrontController::class, 'index']);
//    Route::get('{category}/{slug}', [PagesFrontController::class, 'show']);
//});

Route::middleware('web')->group(function () {
    Route::get('/', [MainSiteController::class, 'index'])->name('home.page');
    Route::get('/experiences', [MainSiteController::class, 'experiences'])->name('experiences.page');
});

Route::middleware('web')->prefix('download')->group(function () {
    Route::get('/{fileName}', [MainSiteController::class, 'getPdfDownload'])->name('download.cv');
});
