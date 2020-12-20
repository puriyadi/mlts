<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrcTrnDriverHistJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trc_trn_driver_hist_jobs', function (Blueprint $table) {
            $table->string('sched_id',30);
            $table->integer('line');
            $table->integer('seqno');
            $table->string('empl_id',30);
            $table->string('si_id');
            $table->string('status')->comment("Receive/Refuse");
            $table->datetime('date_action');
            $table->string('create_by',30);
            $table->primary(['sched_id','line','seqno']);
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
        Schema::dropIfExists('trc_trn_driver_hist_jobs');
    }
}
