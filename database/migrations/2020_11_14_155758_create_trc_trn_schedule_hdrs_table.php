<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrcTrnScheduleHdrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trc_trn_schedule_hdrs', function (Blueprint $table) {
            $table->string('sched_id',20)->primary();
            $table->date('sched_date');
            $table->string('branch_id',10);
            $table->integer('grand_total')->nullable();
            $table->string('payment_id',20)->nullable();
            $table->string('create_by',30);
            $table->string('update_by',30)->nullable();
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
        Schema::dropIfExists('trc_trn_schedule_hdrs');
    }
}
