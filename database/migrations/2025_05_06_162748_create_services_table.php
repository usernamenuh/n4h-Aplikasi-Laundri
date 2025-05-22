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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->enum('type_layanaan', ['Layanan_Cuci_dan_Setrika', 'Layanan_Pakaian_Khusus', 'Layanan_Rumah_Tangga', 'Layanan_Tambahan', 'Layanan_Antar_Jemput']);
            $table->string('nama_layanan');
            $table->decimal('harga', 10, 2);
            $table->string('deskripsi');
            $table->string('gambar_layanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
