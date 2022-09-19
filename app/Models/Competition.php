<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model {
    protected $table = 'competitions';
    protected $fillable = [
        'id',
        'id_category',
        'name',
        'slug',
        'pict',
        'description',
        'start_date',
        'end_date',
        'location',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'id' => 'integer',
        'id_category' => 'integer',
    ];
}