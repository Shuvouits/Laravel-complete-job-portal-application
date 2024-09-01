<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\CandidateSkill;
use App\Models\CandidateExperience;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function skills(){
        return $this->hasMany(CandidateSkill::class, 'candidate_id', 'id');
    }

  

    public function candidateExperiences(){
        return $this->hasMany(CandidateExperience::class, 'candidates_id');
    }


    public function profession(){
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
    }

    public function languages(){
        return $this->hasMany(CandidateLanguage::class,  'candidate_id');
    }

    public function experience(){
        return $this->belongsTo(Experience::class,  'experience_id', 'id');
    }

    function candidateCountry() : BelongsTo {
        return $this->belongsTo(Country::class, 'country', 'id');
    }
    function candidateState() : BelongsTo {
        return $this->belongsTo(State::class, 'state', 'id');
    }
    function candidateCity() : BelongsTo {
        return $this->belongsTo(City::class, 'city', 'id');
    }


}
