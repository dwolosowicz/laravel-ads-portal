<?php namespace App\Http\Controllers;

use App\Entities\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use App\Entities\Offer;

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
        $tags = Tag::all();
        $tagsList = Tag::lists('name', 'id');

		return view('admin.offers.edit', compact("offer", "tags", "tagsList"));
	}

	public function update(OfferRequest $request, $offer) {
        $this->updateOffer($offer, $request->all());

		return redirect(action('AdminOffersController@index'));
	}

    protected function updateOffer($offer, $requestData) {
        $offer->update($requestData);
        $offer->offerTags()->delete();

        $this->createOfferData($requestData, $offer);
    }

	public function destroy($offer) {
		$offer->delete();

		return redirect(action('AdminOffersController@index'));
	}

    protected function createOfferData($requestData, $offer)
    {
        foreach ($requestData['tags'] as $tagId) {
            $offerTag = $offer->offerTags()->create(['tag_id' => $tagId]);

            array_map(function ($value) use ($offerTag) {
                $offerTag->offerTagValues()->create(['value' => $value]);
            }, (array)$requestData['values'][$tagId]);
        }
    }
}