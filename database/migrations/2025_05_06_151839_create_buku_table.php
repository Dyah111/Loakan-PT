<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->string('nama_pengirim');
            $table->string('telepon');
            $table->unsignedBigInteger('user_id')->nullable(); // Menambahkan kolom user_id
            $table->timestamps();

            // Menambahkan foreign key constraint (optional, jika ingin memastikan referensi ke users)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};