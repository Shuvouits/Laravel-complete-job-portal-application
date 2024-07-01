<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Country;
use App\Models\IndustryType;
use App\Models\OrganizationType;
use App\Models\TeamSize;

class Company extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'user_id',
        'name',
        'logo',
        'banner',
        'bio',
        'vision',
        'industry_type_id',
        'organization_type_id',
        'team_size_id',
        'establishment_date',
        'website',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'address',
        'map_link'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function countryData(){
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    public function industry(){
        return $this->belongsTo(IndustryType::class, 'industry_type_id', 'id');
    }

    public function organization(){
        return $this->belongsTo(OrganizationType::class, 'organization_type_id', 'id');
    }

    public function team(){
        return $this->belongsTo(TeamSize::class, 'team_size_id', 'id');
    }


}
