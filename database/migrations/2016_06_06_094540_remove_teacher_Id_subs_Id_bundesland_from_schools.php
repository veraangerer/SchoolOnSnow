<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveTeacherIdSubsIdBundeslandFromSchools extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function ($table) {
            $table->dropColumn('teacher_Id');
            $table->dropColumn('substitue_Id');
            $table->dropColumn('bundesland');

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
