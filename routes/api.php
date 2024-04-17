<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
    CourseController,
    ModuleController
};

Route::get('/teste', function () {
   return response()->json(['message' => 'ok']);
});

Route::apiResource('/courses/{identify}/modules', ModuleController::class);

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{identify}', [CourseController::class, 'show']);
Route::put('/courses/{identify}', [CourseController::class, 'update']);
Route::delete('/courses/{identify}', [CourseController::class, 'destroy']);

Route::post('/courses', [CourseController::class, 'store']);
