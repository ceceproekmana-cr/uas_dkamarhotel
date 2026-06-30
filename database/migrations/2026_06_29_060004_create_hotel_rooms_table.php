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
    Schema::create('hotel_rooms', function (Blueprint $table) {

    $table->id();

    $table->string('id_kamar')->unique();

    $table->string('nomor_kamar');

    $table->string('nama_kamar');

    $table->string('tipe_kamar');

    $table->decimal('harga_per_malam',12,2);

    $table->integer('kapasitas_orang');

    $table->string('foto')->nullable();

    $table->enum('status',[
        'Tersedia',
        'Terisi',
        'Cleaning',
        'Maintenance'
    ])->default('Tersedia');

    $table->text('deskripsi')->nullable();

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_rooms');
    }
};