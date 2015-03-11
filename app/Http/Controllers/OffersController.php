<?php namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Entities\Offer;
use App\Entities\Tag;

use Auth;

class OffersController extends Controller
{

    public function index()
    {
        $offers = Auth::user()->offers()->recent()->get();

        return view("offers.index", compact("offers"));
    }

    public function show($offer)
    {
        return view("offers.show", compact("offer"));
    }

    public function create(Offer $offer)
    {
        $tags = Tag::all();
        $tagsList = Tag::lists('name', 'id');

        return view("offers.create", compact("offer", "tags", "tagsList"));
    }

    public function store(OfferRequest $request)
    {
        $this->createOffer($request->all());

        return redirect(action('OffersController@index'));
    }

    protected function createOffer($requestData)
    {
        $offer = Auth::user()->offers()->create($requestData);

        $this->createOfferData($requestData, $offer);
    }

    public function edit($offer)
    {
        $tags = Tag::all();
        $tagsList = Tag::lists('name', 'id');

        return view('offers.edit', compact("offer", "tags", "tagsList"));
    }

    public function update(OfferRequest $request, $offer)
    {
        $this->updateOffer($offer, $request->all());

        return redirect(action('OffersController@index'));
    }

    protected function updateOffer($offer, $requestData) {
        $offer->update($requestData);
        $offer->offerTags()->delete();

        $this->createOfferData($requestData, $offer);
    }

    public function destroy($offer)
    {
        $offer->delete();

        return redirect(action('OffersController@index'));
    }

    public function close($offer)
    {
        $offer->expire();
        $offer->save();

        return redirect(action('OffersController@index'));
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
