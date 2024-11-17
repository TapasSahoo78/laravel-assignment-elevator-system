<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\ElevatorController;

Route::get('/', [ElevatorController::class, 'getOptimalRoute']);
