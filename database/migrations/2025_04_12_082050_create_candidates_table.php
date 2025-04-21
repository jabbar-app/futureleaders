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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('avatar')->nullable();
            $table->enum('region', ['Langkat', 'Binjai'])->nullable();
            $table->string('identity_number')->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->text('address')->nullable();
            $table->text('skills')->nullable();
            $table->string('instagram')->nullable();
            $table->string('religion')->nullable();
            $table->text('illness')->nullable();
            $table->text('allergies')->nullable();
            $table->string('tshirt_size')->nullable();
            $table->string('jacket_size')->nullable();
            $table->string('father_name')->nullable();
            $table->enum('father_status', ['Masih Hidup', 'Sudah Meninggal'])->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_income')->nullable();
            $table->string('mother_name')->nullable();
            $table->enum('mother_status', ['Masih Hidup', 'Sudah Meninggal'])->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_income')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_relationship')->nullable();
            $table->integer('siblings_count')->nullable();
            $table->json('proof')->nullable();
            $table->string('file_ktp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
