<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostReport extends Model
{
    protected $fillable = [
        'user_id',
        'item_id',
        'date_lost',
        'location_lost',
    ];
}