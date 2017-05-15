<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Offer', function(Blueprint $table)
		{
			//$table->integer('id', true);
            $table->increments('id')->unsigned()->primarykey();
			//$table->integer('location_id')->nullable()->index('location_id');
            $table->integer('location_id')->unsigned();
			$table->integer('ppDpA')->nullable();
			$table->integer('ppDpC')->nullable();
			$table->boolean('overnight')->nullable();
			$table->date('startSeason')->nullable();
			$table->date('endSeason')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Offer');
	}

}
