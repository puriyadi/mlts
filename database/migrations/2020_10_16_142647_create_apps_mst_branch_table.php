<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsMstBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps_mst_branchs', function (Blueprint $table) {
            $table->string('branch_id',5)->primary();
            $table->string('branch_name');
            $table->string('branch_address',4000)->nullable();
            $table->string('branch_phone1',30)->nullable();
            $table->string('branch_phone2',30)->nullable();
            $table->string('branch_phone3',30)->nullable();
            $table->string('branch_phone4',30)->nullable();
            $table->string('branch_phone5',30)->nullable();
            $table->string('branch_fax1',30)->nullable();
            $table->string('branch_fax2',30)->nullable();
            $table->string('branch_fax3',30)->nullable();
            $table->string('branch_fax4',30)->nullable();
            $table->string('branch_fax5',30)->nullable();
            $table->string('branch_handphone1',30)->nullable();
            $table->string('branch_handphone2',30)->nullable();
            $table->string('branch_handphone3',30)->nullable();
            $table->string('branch_handphone4',30)->nullable();
            $table->string('branch_handphone5',30)->nullable();
            $table->string('branch_email1')->nullable();
            $table->string('branch_email2')->nullable();
            $table->string('branch_email3')->nullable();
            $table->string('branch_email4')->nullable();
            $table->string('branch_email5')->nullable();
            $table->string('branch_pic')->nullable();
            $table->string('branch_parent',10)->nullable();
            $table->string('branch_longitute')->nullable();
            $table->string('branch_latitude')->nullable();
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
        Schema::dropIfExists('apps_mst_branchs');
    }
}
