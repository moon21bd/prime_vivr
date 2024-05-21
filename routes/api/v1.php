<?php
use \Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('/tasks', \App\Http\Controllers\API\V1\TaskController::class);
    Route::patch('/tasks/{task}/complete', \App\Http\Controllers\API\V1\CompleteTaskController::class);
});
