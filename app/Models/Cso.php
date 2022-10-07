<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cso extends Model {
    protected $table = 'cso';
    protected $fillable = [
        'id',
        'user_id',
        'team_name',
        'member_1',
        'kartu_pelajar_1',
        'member_2',
        'kartu_pelajar_2',
        'bukti_bayar',
        'verified',
        'try_out',
        'skor',
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