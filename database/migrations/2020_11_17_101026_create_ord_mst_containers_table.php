<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdMstContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ord_mst_containers', function (Blueprint $table) {
            $table->string('cont_id',10)->primary();
            $table->string('cont_name');
            $table->float('cont_length')->nullable();
            $table->float('cont_width')->nullable();
            $table->float('cont_height')->nullable();
            $table->string('active',1);
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
        Schema::dropIfExists('ord_mst_containers');
    }
}
