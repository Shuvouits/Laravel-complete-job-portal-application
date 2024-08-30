<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IndustryType extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name',
        'slug'
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    function companies() : HasMany {
        return $this->hasMany(Company::class, 'industry_type_id', 'id');
    }

}
