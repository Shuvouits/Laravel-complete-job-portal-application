<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'cv',
        'user_id',
        'full_name',
        'title',
        'experience_id',
        'website',
        'birth_date',
        'image',
        'gender',
        'maritial_status',
        'profession_id',
        'status',
        'bio'
    ];
}
