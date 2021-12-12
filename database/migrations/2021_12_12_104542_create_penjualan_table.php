<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('active_cash');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('gudang_id');
            $table->unsignedBigInteger('user_id');
            $table->date('tgl_nota');
            $table->date('tgl_tempo')->nullable();
            $table->string('status_nota');
            $table->string('status_bayar');
            $table->bigInteger('total_barang');
            $table->bigInteger('ppn')->nullable()->default(0);
            $table->bigInteger('biaya_lain')->nullable()->default(0);
            $table->bigInteger('total_jumlah'); // sebelum biaya lain dan ppn
            $table->bigInteger('total_bayar');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customer')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('gudang_id')
                ->references('id')
                ->on('gudang')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('active_cash')
                ->references('active')
                ->on('closed_cash')
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
        Schema::dropIfExists('penjualan');
    }
}
