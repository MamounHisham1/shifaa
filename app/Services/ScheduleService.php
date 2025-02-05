<?php

namespace App\Services;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

   public function readyForCreate(Request $request): bool
   {
        $schedules = Schedule::where('doctor_id', $request->doctor_id)->where('day', $request->day)->get();

        foreach ($schedules as $schedule) {
            if ($schedule->start_time <= $request->start_time && $schedule->end_time >= $request->start_time) {
                return  false; 
            }

            if ($schedule->start_time <= $request->end_time && $schedule->end_time >= $request->end_time) {
                return false;
            }
        }

        return true;
   }
}
