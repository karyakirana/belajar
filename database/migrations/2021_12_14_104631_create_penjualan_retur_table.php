<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanReturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_retur', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash');
            $table->string('kode');
            $table->foreignId('gudang_id')
                ->constrained('gudang')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('customer_id')
                ->constrained('customer')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('kondisi_barang'); // baik atau rusak
            $table->date('tgl_retur');
            $table->bigInteger('jumlah_barang');
            $table->bigInteger('ppn')->nullable();
            $table->bigInteger('biaya_lain')->nullable();
            $table->bigInteger('total_bayar');
            $table->text('keterangan')->nullable();
            $table->integer('print')->default(0);
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
        Schema::dropIfExists('penjualan_retur');
    }
}
