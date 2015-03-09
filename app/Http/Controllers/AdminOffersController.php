<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use App\Offer;

class AdminOffersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$offers = Offer::recent()->get();

		return view("admin.offers.index", compact("offers"));
	}

	public function show($offer) {
		return view("admin.offers.show", compact("offer"));
	}

	public function edit($offer) {
		return view('admin.offers.edit', compact("offer"));
	}

	public function update(OfferRequest $request, $offer) {
		$offer->update($request->all());

		return redirect(action('AdminOffersController@index'));
	}

	public function destroy($offer) {
		$offer->delete();

		return redirect(action('AdminOffersController@index'));
	}
}