<?php

namespace Innoboxrr\LaravelAppUpdate\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    public function map()
    {
        Route::middleware('api')
            ->namespace('Innoboxrr\LaravelAppUpdate\Http\Controllers')
            ->group(__DIR__ . '/../../routes/web.php');  
    }

}
