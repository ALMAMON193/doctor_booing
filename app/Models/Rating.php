<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_id',
        'rated_item_id',
        'rated_item_type',
        'rating',
        'review',
    ];

    public function ratedItem()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function psychologist()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
