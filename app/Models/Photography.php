<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photography extends Model {
    protected $table = 'photographs';
    protected $fillable = [
        'name',
        'email',
        'no_wa',
        'agency',
        'origin',
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