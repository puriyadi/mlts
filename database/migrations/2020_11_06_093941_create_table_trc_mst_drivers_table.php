<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTrcMstDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trc_mst_drivers', function (Blueprint $table) {
            $table->string('drv_id',10)->primary();
            $table->string('empl_id',10);
            $table->string('drv_name');
            $table->string('drv_handphone');
            $table->string('imei_handphone')->nullable();
            $table->string('phone_id')->nullable();
            $table->string('active',1);
            $table->string('create_by',20);
            $table->string('update_by',20)->nullable();
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
        Schema::dropIfExists('trc_mst_drivers');
    }
}
