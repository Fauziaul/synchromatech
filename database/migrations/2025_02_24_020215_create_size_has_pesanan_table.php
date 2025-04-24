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
        Schema::create('size_has_pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('xl')->nullable();
            $table->string('xxl')->nullable();
            $table->string('xxxl')->nullable();
            $table->string('l')->nullable();
            $table->string('s')->nullable();
            $table->string('m')->nullable();
            $table->unsignedBigInteger('id_pesanan')->nullable();
            $table->foreign('id_pesanan')->references('id')->on('pesanan')->onDelete('set null');
            $table->string('id_produk')->nullable();
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('size_has_pesanan');
    }
};
