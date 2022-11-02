<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pes extends Model {
    protected $table = 'pes';
    protected $fillable = [
        'email',
        'name',
        'npm',
        'no_wa',
        'major',
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