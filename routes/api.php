<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TaskController as V1TaskController;


Route::prefix('v1')->group(function () {
    Route::apiResource('tasks', V1TaskController::class);
});
