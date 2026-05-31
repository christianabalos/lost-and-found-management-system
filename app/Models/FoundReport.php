<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoundReport extends Model
{
    protected $fillable = [
        'user_id',
        'item_id',
        'date_found',
        'location_found'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}