<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIQResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iq_results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('candidate_id');
            $table->enum('status', ['hold', 'complete']);
            $table->enum('level', ['low', 'below middle', 'middle', 'above middle', 'high'])->nullable();
            $table->integer('result')->nullable();
            $table->tinyInteger('attempts')->default(0);
            $table->tinyInteger('allowed_attempts')->default(0);
            $table->timestamps();

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
        Schema::dropIfExists('tests');
    }
}
