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
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skrining_id')->constrained('skrining')->cascadeOnDelete();
            $table->foreignId('gejala_id')->constrained('gejala');
            $table->unsignedTinyInteger('pilihan_jawaban');
            $table->decimal('nilai_mu', 5, 4)->nullable();
            $table->decimal('cf_gejala', 5, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban');
    }
};
