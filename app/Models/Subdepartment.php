<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subdepartment extends Model
{
    protected $fillable = [
        'txtIdSubDept',
        'txtNamaSubDept',
        'department_id'
    ];

    public function department() : BelongsTo
    {
        return $this->belongsTo('App\Models\Department');
    }
}
