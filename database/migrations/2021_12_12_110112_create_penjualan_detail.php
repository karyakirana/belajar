<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penjualan_id');
            $table->unsignedBigInteger('produk_id');
            $table->bigInteger('harga');
            $table->bigInteger('jumlah');
            $table->float('diskon', '2');
            $table->bigInteger('sub_total');
            $table->timestamps();

            $table->foreign('penjualan_id')
                ->references('id')
                ->on('penjualan')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('produk_id')
                ->references('id')
                ->on('produk')
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
        Schema::dropIfExists('penjualan_detail');
    }
}
