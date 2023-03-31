<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cmf extends Model
{
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'no_cmf'
            ]
        ];
    }

    protected $fillable = [
        'no_cmf',
        'judul_perubahan',
        'perubahan',
        'tanggal',
        'jenis_perubahan',
        'target_implementasi',
        'tipe_perubahan',
        'alasan_perubahan',
        'dampak_terhadap_perubahan',
        'deskripsi_perubahan',
        'status_pengajuan',
        'department_id',
        'subdepartment_id',
        'user_id',
        'step',
        'inserted_by',
        'updated_by'
    ];

    // relationship
    public function risks(): HasMany{
        return $this->hasMany('App\Models\Risk');
    }

    public function departments(): BelongsToMany{
        return $this->belongsToMany('App\Models\Department')->withTimestamps();
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function activity(): HasOne
    {
        return $this->hasOne('App\Models\Activity');
    }

    public function subdepartments(): BelongsToMany{
        return $this->belongsToMany('App\Models\Subdepartment')->withTimestamps();
    }

    public function signatures(): HasMany
    {
        return $this->hasMany('App\Models\Signature');
    }

    public function steps(): HasMany
    {
        return $this->hasMany('App\Models\Step');
    }
}
