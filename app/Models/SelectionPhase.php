<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectionPhase extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'selection_phases';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'is_active'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
        'is_active'  => 'boolean'
    ];

    /**
     * Relasi ke scores (candidate_scores).
     * Satu fase seleksi bisa memiliki banyak nilai/skor kandidat.
     */
    public function scores()
    {
        return $this->hasMany(CandidateScore::class, 'selection_phase_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderByDesc('end_date');
    }
}
