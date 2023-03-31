<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Signature extends Model
{
    protected $fillable = [
        'cmf_id',
        'user_id',
        'is_signature',
        'step',
        'keterangan',
        'catatan'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
}
