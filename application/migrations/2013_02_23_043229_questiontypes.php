<?php

class Questiontypes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('questiontypes', function($table)
		{
			$table->increments('id');
			$table->string('type');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('questiontypes' );
	}

}