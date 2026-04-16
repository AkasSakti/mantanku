<?php

use App\Http\Controllers\MantanController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/mantan');

Route::resource('mantan', MantanController::class)->except(['show']);
