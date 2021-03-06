<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExamPets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_pets', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets');

            $table->unsignedInteger('exam_id');
            $table->foreign('exam_id')->references('id')->on('exams');

            $table->string('status');
            $table->string('views');


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
        Schema::dropIfExists('exam_pets');
    }
}
