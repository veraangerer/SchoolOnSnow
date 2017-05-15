<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DowncaseAndPluraliseAlTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('Class', 'classes');
        Schema::rename('Location', 'locations');
        Schema::rename('Offer', 'offers');
        Schema::rename('School', 'schools');
        Schema::rename('Student', 'students');
        Schema::rename('Teacher', 'teachers');
        Schema::rename('Wish', 'wishes');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('classes', 'Class');
        Schema::rename('locations', 'Location');
        Schema::rename('offers', 'Offer');
        Schema::rename('schools', 'School');
        Schema::rename('students', 'Student');
        Schema::rename('teachers', 'Teacher');
        Schema::rename('wishes', 'Wish');
    }
}
