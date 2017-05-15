<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('School', function(Blueprint $table)
		{
			$table->integer('idNumber')->unsigned()->primary();//SKZ?
			$table->integer('teacher_Id')->unsigned();
			$table->integer('substitue_Id')->nullable();
			$table->string('bundesland')->nullable();
			$table->string('address');
			$table->string('name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('School');
	}

}
