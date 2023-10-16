<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/courses', [CourseController::class, 'index'])->name('index');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('show');

Route::get('/courses/{id}/modules', [ModuleController::class, 'index'])->name('modules');

Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
Route::get('/lessons/{id}', [LessonController::class, 'show']);

Route::post('/lessons/viewed', [LessonController::class, 'viewed']);

Route::get('supports', [SupportController::class, 'index']);

Route::get('/', function () {
    return response()->json(['message' => 'Tiago']);
});
