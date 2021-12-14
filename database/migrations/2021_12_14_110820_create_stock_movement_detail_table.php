<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockMovementDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_movement_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_movement_id')
                ->constrained('stock_movement')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('produk_id')
                ->constrained('produk')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->bigInteger('jumlah');
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
        Schema::dropIfExists('stock_movement_detail');
    }
}
