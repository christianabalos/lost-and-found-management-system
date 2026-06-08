<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoundReport extends Model
{
    protected $fillable = [
        'user_id',
        'item_id',
        'item_name',
        'category',
        'description',
        'item_image',
        'date_found',
        'location_found',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function matches()
    {
        return $this->hasMany(ItemMatch::class);
    }
}
