<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();  // Links to users table
            $table->string('speciality');
            $table->text('qualification');
            $table->string('experience');
            $table->string('available_days')->nullable();
            $table->integer('consultation_fee')->nullable();
            $table->string('license_number')->nullable();
            $table->text('bio')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
