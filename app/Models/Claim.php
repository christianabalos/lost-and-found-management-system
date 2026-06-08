<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
    {
        protected $fillable = [
            'user_id',
            'item_id',
            'reason',
            'unique_identifiers',
            'date_lost',
            'location_lost',
            'proof_image',
            'claim_status',
            'admin_notes',
            'reviewed_by',
            'verified_at',
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}