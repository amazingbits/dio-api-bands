<?php

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

Route::prefix("v1")->group(function () {
    Route::prefix("bands")->group(function () {
        Route::get("/all", "App\Http\Controllers\BandsController@all")->name("bands.all");
        Route::get("/id/{bandId}", "App\Http\Controllers\BandsController@all")->name("bands.getById");
        Route::get("/gender/{bandGender}", "App\Http\Controllers\BandsController@all")->name("bands.getByGender");
        Route::post("/save", "App\Http\Controllers\BandsController@save")->name("bands.save");
        Route::put("/update/{bandId}", "App\Http\Controllers\BandsController@update")->name("bands.update");
        Route::delete("/delete/{bandId}", "App\Http\Controllers\BandsController@delete")->name("bands.delete");
    });
});

Route::fallback(function () {
    return response()->json([
        "error" => "Not found"
    ])->setStatusCode(404);
});
