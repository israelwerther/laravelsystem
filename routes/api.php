<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserGroupController;
use Illuminate\Support\Facades\Route;

Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::patch('/users/{id}', [UserController::class, 'update']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

Route::apiResource('user-groups', UserGroupController::class);

Route::post('users/{user_id}/groups', 'UserController@associateToGroup');

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
