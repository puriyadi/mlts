<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrcMstVehicleHistDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trc_mst_vehicle_hist_docs', function (Blueprint $table) {
            $table->string('vhc_id',10);
            $table->string('doc_id',10);
            $table->integer('line');
            $table->string('doc_name'); 
            $table->string('owner_id',10);
            $table->string('doc_no',30)->nullable();
            $table->date('doc_exp_date',30)->nullable();
            $table->string('remark',4000)->nullable();
            $table->string('create_by',30);
            $table->string('update_by',30)->nullable();
            $table->primary(['vhc_id','doc_id','line']);
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
        Schema::dropIfExists('trc_mst_vehicle_hist_docs');
    }
}
