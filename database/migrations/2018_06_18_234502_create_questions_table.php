<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('image')->nullable();
            $table->string('condition')->nullable();
            $table->unsignedInteger('correct_answer_id')->nullable();
            $table->unsignedInteger('answer_1_id')->nullable();
            $table->unsignedInteger('answer_2_id')->nullable();
            $table->unsignedInteger('answer_3_id')->nullable();
            $table->unsignedInteger('answer_4_id')->nullable();
            $table->timestamps();

            $table->foreign('correct_answer_id')
                ->references('id')->on('answers')
                ->onDelete('SET NULL');

            $table->foreign('answer_1_id')
                ->references('id')->on('answers')
                ->onDelete('SET NULL');

            $table->foreign('answer_2_id')
                ->references('id')->on('answers')
                ->onDelete('SET NULL');

            $table->foreign('answer_3_id')
                ->references('id')->on('answers')
                ->onDelete('SET NULL');

            $table->foreign('answer_4_id')
                ->references('id')->on('answers')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
