<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementaryWishes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementary_wishes' , function(Blueprint $table) {
            $table->increments('id');//random generated ID (alphabet & numbers) --> PDF
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes')->onUpdate('restrict')->onDelete('cascade');
            $table->integer('cities_countries_id')->unsigned();
            $table->foreign('cities_countries_id')->references('id')->on('elementary_offer_cities_countries')->onUpdate('restrict')->onDelete('cascade');
            $table->string('primaryDateStart');
            $table->string('primaryDateEnd');
            $table->string('secondaryDateStart');
            $table->string('secondaryDateEnd');
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('elementary_wishes');
    }
}
