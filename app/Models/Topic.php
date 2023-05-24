<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topics';

    protected $fillable = [
        'id',
        'lecturer_id',
        'cryptography',
        'dss',
        'game_dev',
        'ai',
        'expert_system',
        'nlp',
        'image_processing',
        'iot',
        'cyber_security',
        'cloud_computing',
    ];
}
