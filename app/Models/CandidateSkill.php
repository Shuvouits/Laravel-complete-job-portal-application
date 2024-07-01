<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidate;
use App\Models\Skill;

class CandidateSkill extends Model
{
    use HasFactory;
    protected $fillable = ['candidate_id', 'skill_id'];

    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }

    public function skill(){
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }

}
