<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $table = 'alternatives';

    protected $fillable = [
        'id',
        'lecturer_id',
        'criteria_1',
        'criteria_3',
        'criteria_4',
    ];

    protected $casts = [
        'criteria_1' => 'float',
        'criteria_3' => 'float',
        'criteria_4' => 'float',
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}
