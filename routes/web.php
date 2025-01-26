<?php

use App\Http\Controllers\Api\V1\AppointmentController;
use App\Http\Controllers\Api\V1\DoctorController;
use App\Http\Controllers\Api\V1\PatientController;
use App\Http\Controllers\Api\V1\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'api/v1'], function () {
    Route::apiResource('doctors', DoctorController::class);
    Route::apiResource('patients', PatientController::class);
    Route::apiResource('schedules', ScheduleController::class);
    Route::apiResource('appointments', AppointmentController::class);
});