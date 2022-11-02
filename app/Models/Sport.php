<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model {
    protected $table = 'sports';
    protected $fillable = [
        'email',
        'category',
        'leader',
        'npm',
        'no_wa',
        'team_name',
        'major',
        'formulir',
        'ktm',
        'bukti_bayar',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'id' => 'integer',
    ];
}