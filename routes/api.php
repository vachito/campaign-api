<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth:api'
], function(){
    Route::apiResource('/campaigns', CampaignController::class);
});

