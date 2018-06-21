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
            $table->unsignedInteger('business_sector_id')->nullable();
            $table->unsignedInteger('image_id')->nullable();
            $table->string('address');
            $table->string('city');
            $table->unsignedInteger('country_id')->nullable();;
            $table->string('phone');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('business_sector_id')
                ->references('id')->on('business_sectors')
                ->onDelete('SET NULL');

            $table->foreign('image_id')
                ->references('id')->on('images')
                ->onDelete('SET NULL');

            $table->foreign('country_id')
                ->references('id')->on('countries')
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
        Schema::dropIfExists('companies');
    }
}
