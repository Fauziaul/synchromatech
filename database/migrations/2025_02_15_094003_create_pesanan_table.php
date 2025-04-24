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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            
            $table->string('id_produk')->nullable();
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('set null');
            
            $table->string('id_kategori')->nullable();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('set null');
            
            $table->string('nama_pemesan');
            $table->string('email');
            $table->integer('jumlah');
            $table->string('nohp');
            $table->string('ukuran');
            $table->string('design');
            $table->text('catatan');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
