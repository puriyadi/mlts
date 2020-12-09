<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldStatusScheduleDtlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trc_trn_schedule_dtls', function (Blueprint $table) {
            $table->string('status')->comment('OP=>Open, AS=>Assign, RJ=>ReceiveJob, OG=>OutGarasi, AD=>ArriveDepo, OD=>OutDepo, AP=>ArrivePickup, LP=>LoadingPickup, OP=>OutPickup, AU=>ArriveUnloading, UL=>Unloading, OU=>OutUnloading, CL=>Close')
            ->after('receive_assign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('status');
    }
}
