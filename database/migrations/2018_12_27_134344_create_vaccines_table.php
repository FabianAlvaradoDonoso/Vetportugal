<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Vacuna
        Schema::create('vaccines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });



        //Desparasitación
        Schema::create('dewormings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->date('scheduled_date')->nullable();
            $table->date('application_date')->nullable();

            //Foreign Keys

            $table->unsignedInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->softDeletes();
            $table->timestamps();
        });

        //Vacunación
        Schema::create('pets_vaccines', function (Blueprint $table) {
            $table->increments('id');
            $table->date('scheduled_date')->nullable();
            $table->date('application_date')->nullable();
            $table->time('scheduled_time');
            $table->string('note')->nullable();
            //Foreign Keys

            $table->unsignedInteger('vaccine_id');
            $table->foreign('vaccine_id')->references('id')->on('vaccines');

            $table->unsignedInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('deworming_pet', function (Blueprint $table) {
            $table->increments('id');
            $table->date('scheduled_date');
            $table->date('application_date');
            $table->string('note')->nullable();

            $table->unsignedInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets');

            $table->unsignedInteger('deworming_id');
            $table->foreign('deworming_id')->references('id')->on('dewormings');
            $table->softDeletes();
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
        Schema::dropIfExists('pets_vaccines');
        Schema::dropIfExists('deworming_pet');
        Schema::dropIfExists('dewormings');
        Schema::dropIfExists('vaccines');
    }
}
