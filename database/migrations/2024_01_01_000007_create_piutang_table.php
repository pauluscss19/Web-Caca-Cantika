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
        Schema::create('piutang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_debitur', 150)->nullable();
            $table->decimal('jumlah_piutang', 15, 2)->nullable();
            $table->enum('status', ['lunas', 'belum lunas'])->nullable();
            $table->date('tanggal_jatuh_tempo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piutang');
    }
};
