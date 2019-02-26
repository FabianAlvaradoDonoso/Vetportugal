<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Para Raza
        Schema::create('breeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Nombre de la raza del animal');

            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');

            $table->softDeletes();

            $table->timestamps();
        });

        //Para Sexo
        Schema::create('genders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        //Para Alimento
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birthdate');
            $table->string('color');
            $table->date('castration_date')->nullable();
            $table->string('weight');
            $table->string('picture')->nullable();


            //Foreign Keys

            $table->unsignedInteger('breed_id');
            $table->foreign('breed_id')->references('id')->on('breeds');

            $table->unsignedInteger('gender_id');
            $table->foreign('gender_id')->references('id')->on('genders');

            $table->unsignedInteger('food_id');
            $table->foreign('food_id')->references('id')->on('foods');

            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

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
        Schema::dropIfExists('pets');
        Schema::dropIfExists('breeds');
        Schema::dropIfExists('genders');
        Schema::dropIfExists('foods');
    }
}
