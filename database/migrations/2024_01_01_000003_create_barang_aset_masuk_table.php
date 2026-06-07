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
        Schema::create('barang_aset_masuk', function (Blueprint $table) {
            $table->id('id_aset');
            $table->string('kode_aset', 20);
            $table->string('nama_aset', 100);
            $table->string('kategori_aset', 50);
            $table->integer('jumlah');
            $table->string('satuan', 20)->nullable();
            $table->string('kondisi_aset', 50)->nullable();
            $table->date('tanggal_masuk');
            $table->string('sumber_aset', 100)->nullable();
            $table->string('lokasi_aset', 100)->nullable();
            $table->decimal('nilai_aset', 15, 2)->nullable();
            $table->string('status_aset', 50)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_aset_masuk');
    }
};
