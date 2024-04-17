<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
    CourseController
};

Route::get('/teste', function () {
   return response()->json(['message' => 'ok']);
});

Route::get('/courses', [CourseController::class, 'index']);