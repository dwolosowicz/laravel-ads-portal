<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use JavaScript;
use Config;

class ViewServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::creator("app", function($view) {
			JavaScript::put([
				'dateFormat' => Config::get('patterns.date.js')
			]);
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
