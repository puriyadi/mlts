<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrcMstVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trc_mst_vehicles', function (Blueprint $table) {
            $table->string('vhc_id',10)->primary();
            $table->string('vhc_name');
            $table->string('vhc_plat_no',10);
            $table->integer('vhc_year')->nullable();
            $table->integer('vhc_cc')->nullable();
            $table->string('vhc_machine_no',30)->nullable();
            $table->string('vhc_frame_no',30)->nullable();
            $table->string('vhc_color',30)->nullable();
            $table->integer('vhc_count_ban')->nullable();
            $table->text('remark')->nullable();
            $table->string('is_asset',1)->nullable();
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
        Schema::dropIfExists('trc_mst_vehicles');
    }
}
