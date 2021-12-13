<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHargaProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->bigInteger('harga')->after('nama');
            $table->text('keterangan')->after('cover')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable()->change();
            $table->unsignedBigInteger('kategori_harga_id')->nullable()->change();
            $table->string('kode_lokal')->nullable()->change();
            $table->string('penerbit')->nullable()->change();
            $table->bigInteger('hal')->nullable()->change();
            $table->string('cover')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropColumn(['harga', 'keterangan']);
        });
    }
}
