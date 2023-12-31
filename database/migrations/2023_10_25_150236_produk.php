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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100)->nullable();
            $table->enum('kategori', ['Pakaian', 'Celana', 'Topi', 'Jas', 'Sepatu', 'Jaket', 'Tas', 'Dompet'])->default('Pakaian');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('produk');
    }
};
