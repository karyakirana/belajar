<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplier', function (Blueprint $table) {
            $table->foreign('supplier_jenis_id')
                ->references('id')
                ->on('supplier_jenis')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supplier', function (Blueprint $table) {
            $table->dropForeign('supplier_jenis_id');
        });
    }
}
