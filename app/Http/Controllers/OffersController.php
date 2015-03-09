<?php namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Offer;

use Auth;

class OffersController extends Controller {

	public function index() {
		$offers = Auth::user()->offers()->recent()->get();

		return view("offers.index", compact("offers"));
	}

	public function show($offer) {
		return view("offers.show", compact("offer"));
	}

	public function create(Offer $offer) {
		return view("offers.create", compact("offer"));
	}

	public function store(OfferRequest $request) {
		$offer = Auth::user()->offers()->create($request->all());

		return redirect(action('OffersController@index'));
	}

	public function edit($offer) {
		return view('offers.edit', compact("offer"));
	}

	public function update(OfferRequest $request, $offer) {
		$offer->update($request->all());

		return redirect(action('OffersController@index'));
	}

	public function destroy($offer) {
		$offer->delete();

		return redirect(action('OffersController@index'));
	}

	public function close($offer) {
		$offer->expire();
		$offer->save();

		return redirect(action('OffersController@index'));
	}
}
