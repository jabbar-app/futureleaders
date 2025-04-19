<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateScore extends Model
{
    protected $table = 'candidate_scores';
    protected $guarded = ['id'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function selectionPhase()
    {
        return $this->belongsTo(SelectionPhase::class, 'selection_phase_id');
    }
}
