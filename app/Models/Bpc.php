<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bpc extends Model {
    protected $table = 'bpc';
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
        'member_3',
        'identitas_3',
        'bukti_bayar',
        'bmc',
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