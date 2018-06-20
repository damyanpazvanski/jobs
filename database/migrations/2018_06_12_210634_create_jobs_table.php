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
            $table->integer('company_id')->references('id')->on('companies')->onDelete('delete');
            $table->integer('country_id')->references('id')->on('countries')->onDelete('SET NULL')->nullable();
            $table->string('position');
            $table->string('work_time_id')->references('id')->on('work_times')->onDelete('SET NULL')->nullable();
            $table->string('city');
            $table->enum('status', ['open', 'closed']);
            $table->text('description')->nullable()->default(null);
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
        Schema::dropIfExists('jobs');
    }
}
