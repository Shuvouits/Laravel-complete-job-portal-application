<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\Country;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'state_id', 'country_id'];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id', 'id');
    }




}
