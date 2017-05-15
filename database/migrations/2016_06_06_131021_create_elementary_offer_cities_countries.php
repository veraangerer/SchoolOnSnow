<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementaryOfferCitiesCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementary_offer_cities_countries' , function(Blueprint $table) {
            $table->increments('id');
            $table->integer('countries_id')->unsigned();
            $table->foreign('countries_id')->references('id')->on('elementary_offer_countries')->onUpdate('restrict')->onDelete('cascade');
            $table->integer('cities_id')->unsigned();
            $table->foreign('cities_id')->references('id')->on('elementary_offer_cities')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('elementary_offer_cities_countries');
    }
}
