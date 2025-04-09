<?php

use App\Http\Controllers\Api\V1\AppointmentController;
use App\Http\Controllers\Api\V1\DoctorController;
use App\Http\Controllers\Api\V1\PatientController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\ScheduleController;
use App\Http\Controllers\Api\V1\SearchDoctor;
use App\Http\Controllers\Api\V1\SlotController;
use App\Http\Controllers\Api\V1\SpecialtyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Api\V1\ProfileResource;


Route::group(['prefix' => 'v1'], function () {
    Route::post('/register', RegisterController::class)->name('register');
    Route::post('/login', AuthController::class)->name('login');
    Route::get('/profile', function (Request $request) {
        $profile = $request->user()->profile;
        $profile->load('user');
        return ProfileResource::make($profile);
    })->middleware('auth:sanctum');
    Route::apiResource('profiles', ProfileController::class)->middleware('auth:sanctum');
    Route::apiResource('doctors', DoctorController::class);
    Route::apiResource('/specialties', SpecialtyController::class);
    Route::get('/search-doctors', SearchDoctor::class);
    Route::apiResource('patients', PatientController::class)->middleware('auth:sanctum');
    Route::apiResource('schedules', ScheduleController::class)->middleware('auth:sanctum');
    Route::apiResource('slots', SlotController::class)->middleware('auth:sanctum');
    Route::apiResource('appointments', AppointmentController::class)->middleware('auth:sanctum'); 
    Route::get('/available-dates', [AppointmentController::class, 'availableDates'])->middleware('auth:sanctum');
});

