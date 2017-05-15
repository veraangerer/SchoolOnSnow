<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Class', function(Blueprint $table)
		{
			//$table->integer('id', true);
            $table->increments('id')->unsigned()->primarykey();
			//$table->integer('school_Id')->index('school_Id');
			//$table->integer('teacher_Id')->index('teacher_Id');
            $table->integer('school_Id')->unsigned()->nullable();
            $table->integer('teacher_Id')->unsigned();
			$table->string('name')->nullable();
			$table->integer('sumstudents');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Class');
	}

}
