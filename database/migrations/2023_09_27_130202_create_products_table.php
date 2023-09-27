<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk');
            $table->unsignedBigInteger('kategori_produk_id'); // Ini adalah kolom kunci asing untuk menghubungkan dengan kategori
            $table->string('nama_produk');
            $table->decimal('harga_produk', 10, 2); // Menggunakan decimal untuk harga produk dengan dua angka desimal
            $table->text('deskripsi_produk');
            $table->string('foto_produk')->nullable();
            $table->timestamps();

            $table->foreign('kategori_produk_id')->references('id')->on('categories'); // Menghubungkan kolom kunci asing ke tabel kategori
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
