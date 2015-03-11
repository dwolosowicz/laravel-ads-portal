<?php namespace App\Http\Controllers;

use App\Entities\Offer;
use Input;

class HomeController extends Controller {

    public function index() {
    	$offers = Offer::recent()->notExpired()->get();

        return view('home', compact("offers"));
    }

    public function search() {
        $offers = Offer::recent()
            ->notExpired()
            ->titled(Input::get('title'))
            ->tagged(Input::get('tags'))
            ->get();

		return view("home", compact("offers"));
    }

    public function details($offer) {
    	return view("offers.show", compact("offer"));
    }
}
