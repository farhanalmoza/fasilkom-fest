<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ml extends Model {
    protected $table = 'ml';
    protected $fillable = [
        'email',
        'team_name',
        'team_leader',
        'no_wa',
        'major',
        'bukti_bayar',
        'formulir'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'id' => 'integer',
    ];
}