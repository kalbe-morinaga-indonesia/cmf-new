<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    protected $fillable = [
        'txtIdDept',
        'divisi_id',
        'txtNamaDept',
    ];

    public function divisi(): BelongsTo
    {
        return $this->belongsTo('App\Models\Divisi');
    }
}
