<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('gender');
            $table->string('nomor_identitas');
            $table->string('jenis_identitas');
            $table->string('npwp')->nullable();
            $table->string('status');
            $table->text('alamat');
            $table->string('kota');
            $table->string('kode_pos')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // foreign
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('pegawai');
    }
}
