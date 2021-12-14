<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  CreateStockOpnameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_opname', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash');
            $table->string('kode');
            $table->string('kondisi_barang');
            $table->foreignId('gudang_id')
                ->constrained('gudang')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('pegawai_id')
                ->nullable()
                ->constrained('pegawai')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->date('tgl_opname');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('stock_opname');
    }
}
