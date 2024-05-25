<?php

use Illuminate\Http\Request;
use App\Models\SejarahSekolah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MajorController;
use App\Http\Controllers\Api\SlideController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\VisiMisiController;
use App\Http\Controllers\Api\SchoolProfileController;
use App\Http\Controllers\Api\SejarahSekolahController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{article}', [ArticleController::class, 'show']);

Route::get('/majors', [MajorController::class, 'index']);
Route::get('/majors/{major}', [MajorController::class, 'show']);
Route::delete('/removeImageCarousel/{index}', [MajorController::class, 'removeImageCarousel'])->name('removeImageCarousel');


Route::get('/slides', [SlideController::class, 'index']);

Route::get('/school-profile', [SchoolProfileController::class, 'index']);
Route::get('/sejarah-sekolah', [SejarahSekolahController::class, 'index']);
Route::get('/visi-misi', [VisiMisiController::class, 'index']);
