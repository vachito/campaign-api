<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth:api'
], function(){
    Route::get('/test', function () {
        return "hola desde test en campaign";
    });
});

