<?php

use Illuminate\Support\Facades\Route;

Route::post('app-update', 'UpdateController@update')->name('app.update');