<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model {
    protected $table = 'covers';
    protected $fillable = [
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