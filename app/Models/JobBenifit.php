<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobBenifit extends Model
{
    use HasFactory;

    function benefit() : BelongsTo {
        return $this->belongsTo(Benifit::class, 'benefit_id', 'id');
    }
}
