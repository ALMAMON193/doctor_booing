<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{

    protected $fillable = [

        'title',
        'short_description',
        'status',

    ];

}
