<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Candidate extends Model
{
    use HasFactory;
    use Sluggable;

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
        'bio',
        'country',
        'state',
        'city',
        'address',
        'phone_one',
        'phone_two',
        'email'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'full_name'
            ]
        ];
    }
}
