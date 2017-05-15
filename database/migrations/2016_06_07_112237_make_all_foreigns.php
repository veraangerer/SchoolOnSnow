<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeAllForeigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classes', function(Blueprint $table)
        {
            /*$table->foreign('school_Id', 'class_ibfk_1')->references('idNumber')->on('School')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('teacher_Id', 'class_ibfk_2')->references('id')->on('Teacher')->onUpdate('RESTRICT')->onDelete('CASCADE');*/
            $table->foreign('school_Id')->references('idNumber')->on('schools')->onDelete('CASCADE');
        });

        Schema::table('offers', function(Blueprint $table)
        {
            //$table->foreign('location_id', 'offer_ibfk_1')->references('id')->on('Location')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
        Schema::table('students', function(Blueprint $table)
        {
            //$table->foreign('class_Id', 'student_ibfk_1')->references('id')->on('Class')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('class_Id')->references('id')->on('classes')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
        Schema::table('teachers', function(Blueprint $table)
        {
            //$table->foreign('school_Id', 'teacher_ibfk_1')->references('idNumber')->on('School')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('school_Id')->references('idNumber')->on('schools')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
        Schema::table('wishes', function(Blueprint $table)
        {
            /*$table->foreign('class_id', 'wish_ibfk_1')->references('id')->on('Class')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('offer_id', 'wish_ibfk_2')->references('id')->on('Offer')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('teacher1_id', 'wish_ibfk_3')->references('id')->on('Teacher')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('teacher2_id', 'wish_ibfk_4')->references('id')->on('Class')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('location_Id', 'wish_ibfk_5')->references('id')->on('Location')->onUpdate('RESTRICT')->onDelete('CASCADE');*/
            $table->foreign('class_id')->references('id')->on('classes')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('offer_id')->references('id')->on('offers')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('teacher1_id')->references('id')->on('teachers')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('teacher2_Id')->references('id')->on('teachers')->onUpdate('RESTRICT')->onDelete('CASCADE');

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
