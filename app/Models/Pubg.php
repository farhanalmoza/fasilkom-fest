<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pubg extends Model {
    protected $table = 'pubg';
    protected $fillable = [
        'team_name',
        'team_leader',
        'no_wa',
        'major',
        'player_2',
        'player_3',
        'player_4',
        'player_5',
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