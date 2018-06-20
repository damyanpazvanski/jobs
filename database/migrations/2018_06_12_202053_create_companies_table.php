<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('website')->nullable();
            $table->integer('business_sector_id')->references('id')->on('business_sectors')->onDelete('SET NULL')->nullable();
            $table->string('image_id')->references('id')->on('images')->onDelete('SET NULL')->nullable();
            $table->string('address');
            $table->string('city');
            $table->integer('country_id')->references('id')->on('countries')->onDelete('SET NULL')->nullable();;
            $table->string('phone');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
