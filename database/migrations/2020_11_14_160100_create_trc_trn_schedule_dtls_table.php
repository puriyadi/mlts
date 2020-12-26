<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrcTrnScheduleDtlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trc_trn_schedule_dtls', function (Blueprint $table) {
            $table->string('sched_id',20);
            $table->integer('line');
            $table->string('si_id',20);
            $table->string('buss_unit',10);
            $table->string('depo')->nullable();
            $table->string('cust_id',10)->nullable();
            $table->integer('line_cust')->nullable();
            $table->string('cust_address',4000)->nullable();
            $table->string('pickup_name');
            $table->string('pickup_contact',200)->nullable();
            $table->string('pickup_address',4000)->nullable();
            $table->string('dest_name')->nullable();
            $table->string('dest_contact',200)->nullable();
            $table->string('dest_address',4000)->nullable();
            $table->string('latitude_pickup')->nullable();
            $table->string('longitude_pickup')->nullable();
            $table->string('latitude_dest')->nullable();
            $table->string('longitude_dest')->nullable();
            $table->string('cont_id',10);
            $table->string('cont_no',50);
            $table->string('padlock',1)->nullable();
            $table->string('seal_no',50)->nullable();
            $table->string('drv_id',10);
            $table->string('vhc_id',10);
            $table->integer('amount')->nullable();
            $table->string('assign_driver',1)->nullable();
            $table->string('receive_assign',1)->nullable();
            $table->string('create_by',30);
            $table->string('update_by',30)->nullable();
            $table->primary(['sched_id','line']);
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
        Schema::dropIfExists('trc_trn_schedule_dtls');
    }
}
