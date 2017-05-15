<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeacherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Teacher', function(Blueprint $table)
		{
			//$table->integer('id', true);
            $table->increments('id')->unsigned()->primarykey();
			$table->string('firstName');
			$table->string('lastName');
			$table->string('email')->nullable();
			$table->string('password');
			//$table->integer('school_Id')->index('school_Id');
            $table->integer('school_Id')->unsigned();
			$table->string('telephone');
			$table->boolean('isContact');
			$table->boolean('isSub');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Teacher');
	}

}
