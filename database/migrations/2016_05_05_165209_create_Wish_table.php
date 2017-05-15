<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWishTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Wish', function(Blueprint $table)
		{
			//$table->integer('id', true);
            $table->increments('id')->unsigned()->primarykey();
			/*$table->integer('class_id')->index('class_id');
			$table->integer('offer_id')->index('offer_id');
			$table->integer('teacher1_id')->index('teacher1_id');
			$table->integer('teacher2_id')->index('teacher2_id');
			$table->integer('location_Id')->index('location_Id');*/
            $table->integer('class_id')->unsigned();
			$table->integer('offer_id')->unsigned();
			$table->integer('teacher1_id')->unsigned();
			$table->integer('teacher2_id')->unsigned();
			$table->integer('location_Id')->unsigned();
			$table->date('primaryDateStart');
			$table->date('secondaryDateStart')->nullable();
			$table->date('tertiaryDateStart')->nullable();
			$table->date('primaryDateEnd');
			$table->date('secondaryDateEnd')->nullable();
			$table->date('tertiaryDateEnd')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Wish');
	}

}
