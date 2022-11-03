<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videography extends Model {
    protected $table = 'videographs';
    protected $fillable = [
        'participation',
        'name',
        'email',
        'no_wa',
        'agency',
        'occupation',
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