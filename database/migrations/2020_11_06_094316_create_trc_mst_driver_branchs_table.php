<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrcMstDriverBranchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trc_mst_driver_branchs', function (Blueprint $table) {
            $table->string('drv_id',10)->primary();
            $table->string('branch_id',10);
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
        Schema::dropIfExists('trc_mst_driver_branchs');
    }
}
