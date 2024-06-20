<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateExperience extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'candidates_id',
        'company',
        'start',
        'end',
        'designation',
        'department',
        'responsiblities',
        'currently_working'
    ];
}
