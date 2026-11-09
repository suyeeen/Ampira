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
        Schema::create('gejala', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klaster_id')->nullable()->constrained('klaster_rujukan')->nullOnDelete();
            $table->string('kode')->unique();
            $table->text('pertanyaan');
            $table->enum('jalur', ['A', 'B']);
            $table->decimal('cf_pakar', 3, 2)->nullable();
            $table->unsignedTinyInteger('urutan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gejala');
    }
};
