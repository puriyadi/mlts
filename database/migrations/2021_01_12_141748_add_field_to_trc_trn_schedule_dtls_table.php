<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToTrcTrnScheduleDtlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trc_trn_schedule_dtls', function (Blueprint $table) {
            $table->string('pickup_contact_telp')->after('pickup_contact');
            $table->string('dest_contact_telp')->after('dest_contact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trc_trn_schedule_dtls', function (Blueprint $table) {
            $table->dropColumn('pickup_contact_telp');
            $table->dropColumn('dest_contact_telp'); 
        });
    }
}
