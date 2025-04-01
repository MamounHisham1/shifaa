<?php

namespace App\Services;

use App\Models\Schedule;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function readyForBook(Request $request): bool
    {
        $schedule = Schedule::find($request->schedule_id);

        if($schedule->status != 'active') {
            return false;
        }

        if($schedule->max_appointments <= $schedule->appointments->count()) {
            return false;
        }

        return true;
    }

    public function getAvailableDates(Request $request)
    {
        $doctor = Doctor::find($request->doctor_id);
        if(!$doctor) {
            info('Doctor id' . $request->doctor_id . ' not found');
            return ['error' => 'Doctor not found'];
        }
        $dates = $doctor->schedules->where('status', 'active')->pluck('date');
        if($dates->isEmpty()) {
            return ['error' => 'No available dates'];
        }
        return $dates;
    }
}
