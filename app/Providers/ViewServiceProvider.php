<?php namespace App\Providers;

use App\Entities\Tag;
use Illuminate\Support\Facades\DB;
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
        View::composer("partials.nav_search", function($view) {
            $tags = DB::table('tags')
                ->join('offer_tags', 'tag_id', '=', 'tags.id')
                ->join('offer_tag_values', 'offer_tag_values.offer_tag_id', '=', 'offer_tags.id')
                ->select('tags.name', 'offer_tag_values.value')
                ->get();

            $tagStrings = array_map(function ($value) {
                return sprintf("%s: %s", $value->name, $value->value);
            }, $tags);

            $view->with([
                'searchTags' => array_mirror($tagStrings),
                'searchSelectedTitle' => \Input::get('title', ''),
                'searchSelectedTags' => \Input::get('tags', []),
            ]);
        });

		View::creator("app", function() {
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
