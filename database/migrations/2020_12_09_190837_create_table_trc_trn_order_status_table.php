<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTrcTrnOrderStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Trc_trn_order_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sched_id');
            $table->string('line');
            $table->string('si_id');
            $table->string('is_public',1);
            $table->datetime('jobtime');
            $table->string('description',4000);
            $table->string('create_by',30);
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
        Schema::dropIfExists('Trc_trn_order_status');
    }
}
