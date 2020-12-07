<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsMstDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps_mst_documents', function (Blueprint $table) {
            $table->string('doc_id',10)->primary();
            $table->string('doc_name');
            $table->string('doc_type',2);
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
        Schema::dropIfExists('apps_mst_documents');
    }
}
