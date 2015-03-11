<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTags extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_tags', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('offer_id')->unsigned()->nullable();
			$table->foreign('offer_id')->references('id')->on('offer_id')->onDelete('cascade');

			$table->integer('tag_id')->unsigned();
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

			$table->timestamps();
		});

		Schema::create('offer_tag_values', function(Blueprint $table) {
			$table->increments('id');

			$table->string('value');

			$table->integer('offer_tag_id')->unsigned();
			$table->foreign('offer_tag_id')->references('id')->on('offer_tags')->onDelete('cascade');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offer_tags');
		Schema::drop('offer_tag_values');
	}

}
