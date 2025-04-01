<?php

use App\Http\Controllers\Api\V1\AppointmentController;
use App\Http\Controllers\Api\V1\DoctorController;
use App\Http\Controllers\Api\V1\PatientController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\ScheduleController;
use App\Http\Controllers\Api\V1\SlotController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'v1'], function () {
    Route::post('/register', RegisterController::class)->name('register');
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
    Route::apiResource('profiles', ProfileController::class)->middleware('auth:sanctum');
    Route::apiResource('doctors', DoctorController::class);
    Route::apiResource('patients', PatientController::class)->middleware('auth:sanctum');
    Route::apiResource('schedules', ScheduleController::class);
    Route::apiResource('slots', SlotController::class);
    Route::apiResource('appointments', AppointmentController::class); 
    Route::get('/available-dates', [AppointmentController::class, 'availableDates']);
});

