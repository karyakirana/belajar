<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->foreignId('kategori_id')
                ->constrained('produk_kategori')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('kategori_harga_id')
                ->constrained('produk_kategori_harga')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('kode_lokal');
            $table->string('penerbit');
            $table->string('nama');
            $table->bigInteger('hal');
            $table->string('cover', '20');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
