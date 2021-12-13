<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();
            $table->unsignedBigInteger('supplier_jenis_id');
            $table->string('nama');
            $table->text('alamat')->nullable();
            $table->string('telepon', 25)->nullable();
            $table->string('npwp', 25)->nullable();
            $table->string('email', 50)->nullable();
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
        Schema::dropIfExists('supplier');
    }
}
