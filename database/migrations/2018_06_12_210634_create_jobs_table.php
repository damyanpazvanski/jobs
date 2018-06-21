<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('country_id')->nullable();
            $table->string('position');
            $table->unsignedInteger('work_time_id')->nullable();
            $table->string('city');
            $table->enum('status', ['open', 'closed']);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('delete');

            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('SET NULL');

            $table->foreign('work_time_id')
                ->references('id')->on('work_times')
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
        Schema::dropIfExists('jobs');
    }
}
