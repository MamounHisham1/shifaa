<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Slot extends Model
{
    /** @use HasFactory<\Database\Factories\SlotFactory> */
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    public static function generate(Schedule $schedule) {
        $slots = [];
        $currentTime = Carbon::parse("2000-01-01 " . $schedule->start_time);
        $endTime = Carbon::parse("2000-01-01 " . $schedule->end_time);
        
        while ($currentTime->lt($endTime)) {
            $slotEndTime = $currentTime->copy()->addMinutes($schedule->slot_by_min);
            if ($slotEndTime->gt($endTime)) {
                break;
            }

            $slots[] = [
                'schedule_id' => $schedule->id,
                'start_time' => $currentTime->format('H:i'),
                'end_time' => $slotEndTime->format('H:i'),
                'status' => 'available'
            ];

            $currentTime = $slotEndTime;
        }
        
        Slot::insert($slots);
    }
}
