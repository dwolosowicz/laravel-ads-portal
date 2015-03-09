<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;

class AdminUsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return view("admin.users.index", compact("users"));
	}

	public function toggle($user) {
		$user->toggle();
		$user->save();

		return redirect(action("AdminUsersController@index"));
	}

}
