<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentBooking extends Model
{
    protected $guarded = [];

    protected $casts = [
        'appointment_time' => 'datetime:H:i',
        'appointment_date' => 'date',
    ];

    public function psychologist(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'psychologist_id');
    }

    // AppointmentBooking Model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rated_item');
    }

    public function payment(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Payment::class,'appointment_id');
    }

    public function timeslot(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TimeSlot::class,'appointment_time_id');
    }
}
