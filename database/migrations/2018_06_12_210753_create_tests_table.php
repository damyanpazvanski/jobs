<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_id')->references('id')->on('candidates')->onDelete('delete');
            $table->integer('job_id')->references('id')->on('jobs')->onDelete('delete');
            $table->enum('status', ['hold', 'complete']);
            $table->enum('level', ['low', 'below middle', 'middle', 'above middle', 'high'])->nullable();
            $table->integer('result')->nullable();
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
        Schema::dropIfExists('tests');
    }
}
