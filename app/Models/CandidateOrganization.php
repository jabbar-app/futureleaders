<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateOrganization extends Model
{
    protected $table = 'candidate_organizations';
    protected $guarded = ['id'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
}
