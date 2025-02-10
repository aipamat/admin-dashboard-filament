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
        Schema::create('kampuses', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nama_kampus');
            $table->foreignId('id_fasilitas')->constrained('fasilitas')->cascadeOnDelete();
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kampuses');
    }
};
