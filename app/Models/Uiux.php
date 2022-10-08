<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uiux extends Model {
    protected $table = 'uiux';
    protected $fillable = [
        'id',
        'user_id',
        'team_name',
        'no_wa',
        'instansi',
        'member_1',
        'identitas_1',
        'member_2',
        'identitas_2',
        'bukti_bayar',
        'verified',
        'finalis',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];
}