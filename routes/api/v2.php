<?php
use \Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('v2')->group(function () {
    Route::apiResource('/tasks', \App\Http\Controllers\API\V2\TaskController::class);
    Route::patch('/tasks/{task}/complete', \App\Http\Controllers\API\V2\CompleteTaskController::class);
});
