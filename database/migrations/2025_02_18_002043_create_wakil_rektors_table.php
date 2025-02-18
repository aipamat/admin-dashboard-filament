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
        Schema::create('wakil_rektors', function (Blueprint $table) {
            $table->id();
            $table->string('foto_wakil_rektor');
            $table->string('status');
            $table->string('bidang');
            $table->string('nama_wakil_rektor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wakil_rektors');
    }
};
