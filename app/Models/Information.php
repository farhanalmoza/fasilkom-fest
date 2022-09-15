<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model {
    protected $table = 'informations';
    protected $fillable = [
        'id',
        'closing_date',
        'venue',
        'description',
        'email',
        'instagram',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'id' => 'integer',
    ];
}