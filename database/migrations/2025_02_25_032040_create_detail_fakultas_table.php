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
        Schema::create('detail_fakultas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_fakultas')
                ->constrained('fakultas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('id_pimpinan')
                ->constrained('pimpinans')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('id_program_studi')
            ->constrained('program_studis')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_fakultas');
    }
};
