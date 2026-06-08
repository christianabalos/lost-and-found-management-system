<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'first_name',
        'middle_name',
        'last_name',
        'student_id',
        'contact_number',
        'address',
        'email',
        'password',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function lostReports()
    {
        return $this->hasMany(LostReport::class);
    }

    public function foundReports()
    {
        return $this->hasMany(FoundReport::class);
    }

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function getFullNameAttribute()
    {
        return trim(
            $this->first_name . ' ' .
            $this->middle_name . ' ' .
            $this->last_name
        );
    }
}