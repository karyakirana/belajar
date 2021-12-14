<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanReturDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_retur_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penjualan_retur_id')
                ->constrained('penjualan_retur')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('produk_id')
                ->constrained('produk')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->bigInteger('jumlah');
            $table->bigInteger('harga');
            $table->bigInteger('diskon')->nullable()->default(0);
            $table->bigInteger('sub_total');
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
        Schema::dropIfExists('penjualan_retur_detail');
    }
}
