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
        Schema::create('obrolan_pengaduans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laporan_id'); // Foreign key ke laporan
            $table->unsignedBigInteger('pengirim_id'); // User ID yang mengirim
            $table->unsignedBigInteger('penerima_id'); // User ID penerima (admin/user)
            $table->text('pesan'); // Isi pesan
            $table->timestamp('waktu_kirim')->useCurrent(); // Waktu pesan dikirim
            $table->boolean('dibaca')->default(false); // Status baca
            $table->timestamps();

            // Foreign keys
            $table->foreign('laporan_id')->references('id')->on('laporans')->onDelete('cascade');
            $table->foreign('pengirim_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('penerima_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obrolan_pengaduan');
    }
};
