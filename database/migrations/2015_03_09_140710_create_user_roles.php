<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Role;

class CreateUserRoles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$adminRole = new Role;
		$adminRole->name = "admin";
		$adminRole->display_name = "Administrator";
		$adminRole->description = "Overseer of the whole system";
		$adminRole->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Role::whereName("admin")->get()->delete();
	}

}
