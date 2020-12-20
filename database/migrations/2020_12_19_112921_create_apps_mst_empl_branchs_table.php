<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsMstEmplBranchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps_mst_empl_branchs', function (Blueprint $table) {
            $table->string('empl_id',10);
            $table->string('branch_id',5);
            $table->string('create_by',30);
            $table->string('update_by',30)->nullable();
            $table->primary(['empl_id','branch_id']);
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
        Schema::dropIfExists('apps_mst_empl_branchs');
    }
}
