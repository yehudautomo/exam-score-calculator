<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nim',
        'quiz_score',
        'assignment_score',
        'absence_score',
        'practical_score',
        'final_score',
    ];
}
