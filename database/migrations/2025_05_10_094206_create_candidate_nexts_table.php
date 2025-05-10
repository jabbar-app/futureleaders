<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidate_nexts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('candidates')->onDelete('cascade');
            $table->boolean('is_ready_commitment_fee');
            $table->boolean('parent_approval');
            $table->boolean('have_passport')->default(false);
            $table->boolean('willing_create_passport')->nullable();
            $table->boolean('has_special_needs')->default(false);
            $table->text('special_needs_description')->nullable();
            $table->boolean('has_traveled_abroad')->default(false);
            $table->text('abroad_destinations')->nullable();
            $table->text('expectation_from_program')->nullable();
            $table->text('preferred_team_position')->nullable();
            $table->text('preferred_team_position_reason')->nullable();
            $table->text('other_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_nexts');
    }
};
