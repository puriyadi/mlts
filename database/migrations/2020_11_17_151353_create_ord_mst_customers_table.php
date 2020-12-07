<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdMstCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ord_mst_customers', function (Blueprint $table) {
            $table->string('cust_id',10)->primary();
            $table->string('branch_id',10);
            $table->string('cust_name');
            $table->string('cust_address',4000)->nullable();
            $table->string('cust_phone1',30)->nullable();
            $table->string('cust_phone2',30)->nullable();
            $table->string('cust_phone3',30)->nullable();
            $table->string('cust_fax1',30)->nullable();
            $table->string('cust_fax2',30)->nullable();
            $table->string('cust_fax3',30)->nullable();
            $table->string('cust_handphone1',30)->nullable();
            $table->string('cust_handphone2',30)->nullable();
            $table->string('cust_handphone3',30)->nullable();
            $table->string('cust_pic',30)->nullable();
            $table->string('term_id',10)->nullable();
            $table->string('ppn_flag',1)->nullable();
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
        Schema::dropIfExists('ord_mst_customers');
    }
}
