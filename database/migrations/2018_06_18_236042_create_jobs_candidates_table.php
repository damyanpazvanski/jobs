<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_candidates', function (Blueprint $table) {
            $table->integer('job_id');
            $table->integer('candidate_id');

            $table->foreign('job_id')
                ->references('id')->on('jobs')
                ->onDelete('cascade');

            $table->foreign('candidate_id')
                ->references('id')->on('candidates')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
