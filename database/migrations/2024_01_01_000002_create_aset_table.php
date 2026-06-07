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
        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aset', 150)->nullable();
            $table->string('kategori', 100)->nullable();
            $table->decimal('nilai_perolehan', 15, 2)->nullable();
            $table->year('tahun_perolehan')->nullable();
            $table->enum('kondisi', ['baik', 'rusak ringan', 'rusak berat'])->nullable();
            $table->integer('satker_id')->nullable();
            $table->string('gambar', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
