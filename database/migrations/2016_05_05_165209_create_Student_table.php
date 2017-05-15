<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Student', function(Blueprint $table)
		{
			//$table->integer('id', true);
            $table->increments('id')->unsigned()->primarykey();
			//$table->integer('class_Id')->nullable()->index('class_Id');
            $table->integer('class_Id')->unsigned();
			$table->string('firstName')->nullable();
			$table->string('lastname');
			$table->string('bDate');
			$table->string('telPrimary');
			$table->string('telSecondary')->nullable();
			$table->boolean('hasTicket')->default(false);
			$table->boolean('canTakePhotos')->default(false);
			$table->integer('skillLevel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Student');
	}

}
