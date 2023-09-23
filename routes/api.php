<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserControllerAssociateToGroup;
use App\Http\Controllers\Api\UserGroupController;
use Illuminate\Support\Facades\Route;

Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::patch('/users/{id}', [UserController::class, 'update']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

Route::apiResource('user-groups', UserGroupController::class);

Route::get('/users/groups', [UserControllerAssociateToGroup::class, 'index']);
Route::post('/users/groups', [UserControllerAssociateToGroup::class, 'store']);

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
