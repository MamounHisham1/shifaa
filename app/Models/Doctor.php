<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorFactory> */
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
