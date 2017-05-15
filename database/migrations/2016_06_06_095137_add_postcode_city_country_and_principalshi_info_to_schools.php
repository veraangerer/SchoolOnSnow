<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostcodeCityCountryAndPrincipalshiInfoToSchools extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function ($table) {
            $table->string('postcode');
            $table->string('city');
            $table->string('country');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('telephone');
            $table->string('email')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}