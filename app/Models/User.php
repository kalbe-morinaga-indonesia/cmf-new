<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'nik',
        'name',
        'email',
        'password',
        'signature',
        'avatar',
        'department_id',
        'subdepartment_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function department() : BelongsTo
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function subdepartment() : BelongsTo
    {
        return $this->belongsTo('App\Models\Subdepartment');
    }
}
