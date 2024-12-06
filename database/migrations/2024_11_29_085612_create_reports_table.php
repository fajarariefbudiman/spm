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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id(); //1
            $table->integer('user_id'); //2
            $table->string('jenis_pengaduan'); //3
            $table->string('tempat_kejadian'); //4
            $table->string('foto'); //5
            $table->date('sent_time'); //6
            $table->text('deskripsi'); //7
            $table->enum('status', ['Belum Diproses', 'Sedang Diproses', 'Ditolak', 'Selesai'])->default('Belum Diproses'); //8
            $table->text('tanggapan')->nullable(); //9
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
