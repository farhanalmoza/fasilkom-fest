<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model {
    protected $table = 'speakers';
    protected $fillable = [
        'speaker_name',
        'headline',
        'photo',
        'email',
        'linkedin',
        'instagram',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'id_speaker' => 'integer',
    ];
}