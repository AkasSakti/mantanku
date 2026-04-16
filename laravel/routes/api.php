<?php

use App\Http\Controllers\Api\MantanApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('mantan', MantanApiController::class)->names('api.mantan');
