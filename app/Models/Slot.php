<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    /** @use HasFactory<\Database\Factories\SlotFactory> */
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'patient_id',
        'start_time',
        'end_time',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }
}
