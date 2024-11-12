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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->enum('jenis_laporan', [
                'Penyimpangan Wewenang',
                'Pelayanan Hubungan Masyarakat',
                'Ketenagakerjaan',
                'Hukum/Peradilan dan HAM',
                'Maladministrasi dan Pelayanan Publik',
                'Audit dan Evaluasi',
                'Lainnya'
            ]);
            $table->string('jenis_lainnya')->nullable(); // Kolom tambahan untuk opsi "Lainnya"
            $table->enum('status', [
                'Menunggu',       // Pending
                'Sedang Diproses', // In Progress
                'Selesai',        // Resolved
                'Tutup'           // Closed
            ])->default('Menunggu'); // Status kolom dengan enum
            $table->text('keluhan');
            $table->date('tanggal_laporan');
            $table->string('bukti_pendukung')->nullable(); // Menyimpan path file untuk bukti pendukung
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
