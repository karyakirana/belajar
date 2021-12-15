<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockRealtimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_realtime', function (Blueprint $table) {
            $table->id();
            $table->string('kondisi_barang'); // rusak atau baik
            $table->foreignId('gudang_id')
                ->constrained('gudang')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->bigInteger('stock_opname')->default(0);
            $table->bigInteger('stock_in')->default(0);
            $table->bigInteger('stock_out')->default(0);
            $table->bigInteger('stock_akhir')->default(0);
            $table->bigInteger('stock_lost')->default(0);
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
        Schema::dropIfExists('stock_realtime');
    }
}
