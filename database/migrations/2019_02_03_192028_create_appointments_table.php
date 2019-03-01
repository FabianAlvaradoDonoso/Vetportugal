<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');

            $table->unsignedinteger('vet_id');
            $table->foreign('vet_id')->references('id')->on('vets');

            $table->unsignedinteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');

            $table->unsignedinteger('date_time_id');
            $table->foreign('date_time_id')->references('id')->on('date_times');

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
        Schema::dropIfExists('appointments');
    }
}
