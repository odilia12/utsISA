<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('notes');
            $table->date('end_date');
            $table->string('company_name');
            $table->unsignedInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('users');
            $table->unsignedInteger('artist_id');
            $table->foreign('artist_id')->references('id')->on('users');
            $table->tinyInteger('status');
            
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
        Schema::dropIfExists('contracts');
    }
}
