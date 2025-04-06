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

    public function getAvailableDates(int $doctorId)
    {
        $doctor = Doctor::find($doctorId);
        if(!$doctor) {
            info('Doctor id' . $doctorId . ' not found');
            return ['error' => 'Doctor not found'];
        }
        $schedules = $doctor->schedules->where('status', 'active');
        if($schedules->isEmpty()) {
            return ['error' => 'No available dates'];
        }
        $schedules = $this->rejectFullSchedules($schedules);
        $dates = $schedules->pluck('date');
        return $dates;
    }

    protected function rejectFullSchedules($schedules)
    {
        foreach($schedules as $schedule) {
            if($schedule->max_appointments <= $schedule->appointments->count()) {
                $schedules = $schedules->reject(function($item) use ($schedule) {
                    return $item->id === $schedule->id;
                });
            }
        }
        return $schedules;
    }
}
