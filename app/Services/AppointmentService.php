<?php

namespace App\Services;

use App\Models\Schedule;
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
}
