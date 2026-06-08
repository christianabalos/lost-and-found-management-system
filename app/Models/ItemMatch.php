<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemMatch extends Model
{
    protected $fillable = [
        'lost_report_id',
        'found_report_id',
        'match_score',
        'status',
    ];

    public function lostReport()
    {
        return $this->belongsTo(LostReport::class);
    }

    public function foundReport()
    {
        return $this->belongsTo(FoundReport::class);
    }
}
