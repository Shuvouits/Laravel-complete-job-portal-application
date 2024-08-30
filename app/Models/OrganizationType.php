<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrganizationType extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name',
        'slug'
    ];

    function companies() : HasMany {
        return $this->hasMany(Company::class, 'industry_type_id', 'id');
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
