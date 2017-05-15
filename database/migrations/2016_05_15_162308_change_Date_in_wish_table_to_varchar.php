<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDateInWishTableToVarchar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Wish', function($table) {
            $table->string('primaryDateStart', 255)->change();
            $table->string('secondaryDateStart', 255)->change();
            $table->string('tertiaryDateStart', 255)->change();
            $table->string('primaryDateEnd', 255)->change();
            $table->string('secondaryDateEnd', 255)->change();
            $table->string('tertiaryDateEnd', 255)->change();
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
