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
        Schema::create('kategori_hasil', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->decimal('batas_bawah', 5, 4);
            $table->decimal('batas_atas', 5, 4);
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_hasil');
    }
};
