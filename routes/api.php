<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\TemplateMetaController;
use App\Http\Controllers\BucketController;
use App\Http\Controllers\StatusMessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth:api'
], function(){
    Route::apiResource('/campaigns', CampaignController::class)->except(['show']);
    Route::get('/campaigns/{campaign:uuid}', [CampaignController::class, 'show'])->name('campaigns.show');
    Route::apiResource('/template-meta', TemplateMetaController::class)->only(['index']);
    Route::apiResource('/buckets', BucketController::class)->only(['index']);
    Route::apiResource('/status-messages', StatusMessageController::class)->only(['index']);
});

