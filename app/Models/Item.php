<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name',
        'description',
        'image',
        'status'
    ];

    public function lostReport()
    {
        return $this->hasOne(LostReport::class);
    }

    public function foundReport()
    {
        return $this->hasOne(FoundReport::class);
    }

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }
}