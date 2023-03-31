<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Divisi extends Model
{
    protected $fillable = [
        'txtIdDivisi',
        'txtNamaDivisi'
    ];

    public function departments() : HasMany{
        return $this->hasMany('App\Models\Department');
    }
}
