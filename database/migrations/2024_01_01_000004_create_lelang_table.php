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
        Schema::create('lelang', function (Blueprint $table) {
            $table->id();
            $table->integer('aset_id')->nullable();
            $table->date('tanggal_lelang')->nullable();
            $table->decimal('harga_limit', 15, 2)->nullable();
            $table->decimal('harga_terjual', 15, 2)->nullable();
            $table->enum('status', ['proses', 'terjual', 'batal'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lelang');
    }
};
