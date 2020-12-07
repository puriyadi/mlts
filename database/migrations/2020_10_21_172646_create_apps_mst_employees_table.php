<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsMstEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps_mst_employees', function (Blueprint $table) {
            $table->string('empl_id',10)->primary();
            $table->string('empl_fullname');
            $table->string('empl_shortname')->nullable();
            $table->string('empl_placebirth')->nullable();
            $table->date('empl_birthday')->nullable();
            $table->string('empl_gender',1)->nullable();
            $table->string('doc_id',10)->nullable();
            $table->string('empl_on_id',20)->nullable();
            $table->string('empl_address_on_id',4000)->nullable();
            $table->string('empl_address_current',4000)->nullable();
            $table->string('empl_phone1',30)->nullable();
            $table->string('empl_phone2',30)->nullable();
            $table->string('empl_phone3',30)->nullable();
            $table->string('empl_handphone1',30)->nullable();
            $table->string('empl_handphone2',30)->nullable();
            $table->string('empl_handphone3',30)->nullable();
            $table->string('empl_hobbies')->nullable();
            $table->string('relg_id',10)->nullable();
            $table->string('empl_blood',2)->nullable();
            $table->string('empl_email1')->nullable();
            $table->string('empl_email2')->nullable();
            $table->string('empl_email3')->nullable();
            $table->string('empl_photo')->nullable();
            $table->date('empl_start_work')->nullable();
            $table->string('empl_resign',1)->nullable();
            $table->date('empl_resign_date')->nullable();
			$table->string('empl_password')->nullable();
            $table->string('active', 1);
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
        Schema::dropIfExists('apps_mst_employees');
    }
}
