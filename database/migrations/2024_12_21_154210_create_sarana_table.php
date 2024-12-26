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
        Schema::create('sarana', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('jenis_barang');
            $table->integer('jumlah');
            $table->string('kondisi');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sarana', function (Blueprint $table) {
            $table->dropColumn('kode_barang');
        });
    }
};
