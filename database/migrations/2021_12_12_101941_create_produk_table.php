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
            $table->unsignedBigInteger('kategori_id');
            $table->string('kode');
            $table->string('kode_lokal');
            $table->string('penerbit')->nullable();
            $table->string('produk');
            $table->bigInteger('hal')->nullable();
            $table->string('cover');
            $table->bigInteger('harga');
            $table->string('size')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')
                ->references('id')
                ->on('produk_kategori')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
