<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrcMstVehicleMutBranchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trc_mst_vehicle_mut_branchs', function (Blueprint $table) {
            $table->string('vhc_id',10);
            $table->integer('line');
            $table->string('branch_id_old',10);
            $table->string('branch_id_new',10);
            $table->date('mutation_date');
            $table->string('create_by',30);
            $table->string('update_by',30)->nullable();
            $table->primary(['vhc_id','line']);
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
        Schema::dropIfExists('trc_mst_vehicle_mut_branchs');
    }
}
