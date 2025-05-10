<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateNext extends Model
{
    use HasFactory;

    protected $table = 'candidate_nexts';

    protected $fillable = [
        'candidate_id',
        'is_ready_commitment_fee',
        'parent_approval',
        'have_passport',
        'willing_create_passport',
        'has_special_needs',
        'special_needs_description',
        'has_traveled_abroad',
        'abroad_destinations',
        'expectation_from_program',
        'preferred_team_position',
        'preferred_team_position_reason',
        'other_notes',
    ];

    /**
     * Relasi ke model Candidate
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
