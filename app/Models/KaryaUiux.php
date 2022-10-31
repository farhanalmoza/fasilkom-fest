<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KaryaUiux extends Model {
    protected $table = 'karya_uiux';
    protected $fillable = [
        'id',
        'team_id',
        'screen',
        'proposal',
        'demo',
        'prototype',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'id' => 'integer',
        'team_id' => 'integer',
    ];
}