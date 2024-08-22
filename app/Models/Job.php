<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, Sluggable, SoftDeletes;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    function company() : BelongsTo {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    function jobType() : BelongsTo {
        return $this->belongsTo(JobType::class, 'job_type_id', 'id');
    }

    function jobRole() : BelongsTo {
        return $this->belongsTo(JobRole::class, 'job_role_id', 'id');
    }
    function salaryType() : BelongsTo {
        return $this->belongsTo(SalaryType::class, 'salary_type_id', 'id');
    }
    function jobExperience() : BelongsTo {
        return $this->belongsTo(JobExperience::class, 'job_experience_id', 'id');
    }

    function jobEduction() : BelongsTo {
        return $this->belongsTo(Education::class, 'education_id', 'id');
    }
    function tags() : HasMany {
        return $this->hasMany(JobTag::class, 'job_id', 'id');
    }

    function benefits() : HasMany {
        return $this->hasMany(JobBenifit::class, 'job_id', 'id');
    }
    function skills() : HasMany {
        return $this->hasMany(JobSkill::class, 'job_id', 'id');
    }

    function country() : BelongsTo {
        return $this->belongsTo(Country::class);
    }
    function state() : BelongsTo {
        return $this->belongsTo(State::class);
    }
    function city() : BelongsTo {
        return $this->belongsTo(City::class);
    }


}
