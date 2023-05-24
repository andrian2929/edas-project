<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $table = 'lecturers';

    protected $fillable = [
        'id',
        'name',
        'bio',
        'image',
    ];

    public function alternative()
    {
        return $this->hasOne(Alternative::class);
    }

    public function topic()
    {
        return $this->hasOne(Topic::class);
    }
}
