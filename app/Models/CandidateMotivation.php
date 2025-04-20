<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateMotivation extends Model
{
    protected $table = 'candidate_motivations';
    protected $guarded = ['id'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
}
