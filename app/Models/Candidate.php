<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function motivation()
    {
        return $this->hasOne(CandidateMotivation::class, 'candidate_id');
    }

    public function educations()
    {
        return $this->hasMany(CandidateEducation::class, 'candidate_id');
    }

    public function achievements()
    {
        return $this->hasMany(CandidateAchievement::class, 'candidate_id');
    }

    public function organizations()
    {
        return $this->hasMany(CandidateOrganization::class, 'candidate_id');
    }

    public function scores()
    {
        return $this->hasMany(CandidateScore::class, 'candidate_id');
    }
}
