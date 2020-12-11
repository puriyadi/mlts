<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrcTrnScheduleTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trc_trn_schedule_tracks', function (Blueprint $table) {
            $table->string('sched_id',20);
            $table->integer('line');
            $table->datetime('receivejob_time')->nullable();
            $table->string('receivejob_lat')->nullable();
            $table->string('receivejob_long')->nullable();
            $table->datetime('outgarasi_time')->nullable();
            $table->string('outgarasi_lat')->nullable();
            $table->string('outgarasi_long')->nullable();
            $table->datetime('arrivedepo_time')->nullable();
            $table->string('arrivedepo_lat')->nullable();
            $table->string('arrivedepo_long')->nullable();
            $table->datetime('outdepo_time')->nullable();
            $table->string('outdepo_lat')->nullable();
            $table->string('outdepo_long')->nullable();
            $table->datetime('arrivepickup_time')->nullable();
            $table->string('arrivepickup_lat')->nullable();
            $table->string('arrivepickup_long')->nullable();
            $table->datetime('loadpickup_time')->nullable();
            $table->string('loadpickup_lat')->nullable();
            $table->string('loadpickup_long')->nullable();
            $table->datetime('outpickup_time')->nullable();
            $table->string('outpickup_lat')->nullable();
            $table->string('outpickup_long')->nullable();
            $table->datetime('arriveunload_time')->nullable();
            $table->string('arriveunload_lat')->nullable();
            $table->string('arriveunload_long')->nullable();
            $table->datetime('unload_time')->nullable();
            $table->string('unload_lat')->nullable();
            $table->string('unload_long')->nullable();
            $table->datetime('outunload_time')->nullable();
            $table->string('outunload_lat')->nullable();
            $table->string('outunload_long')->nullable();
            $table->datetime('close_time')->nullable();
            $table->string('close_lat')->nullable();
            $table->string('close_long')->nullable();
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
        Schema::dropIfExists('trc_trn_schedule_tracks');
    }
}
