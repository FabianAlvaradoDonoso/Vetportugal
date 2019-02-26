<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetVetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets_vets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symptom')->nullable();
            $table->string('diagnostic')->nullable();
            $table->string('description')->nullable();
            $table->date('date')->nullable();


            //Foreign Keys

            $table->unsignedInteger('vet_id');
            $table->foreign('vet_id')->references('id')->on('vets');

            $table->unsignedInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets');

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
        Schema::dropIfExists('pet_vet');
    }
}
