<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = [
		'name',
		'editable',
		'multiple',
		'default_values'
	];

    public function allValues(Offer $offer) {
        $values = $this->getOfferTagValues($offer);

        return array_merge($this->default_values, var_or($values, []));
    }

    public function values(Offer $offer) {
        $values = $this->getOfferTagValues($offer);

        return var_or($values, []);
    }

    protected function getOfferTagValues(Offer $offer)
    {
        $values = array_get($this->offerTags->lists('values', 'offer_id'),
            $offer->id);
        return $values;
    }

    public function setDefaultValuesAttribute($values) {
		$this->attributes['default_values'] = json_encode(array_combine($values, $values));
	}

    public function getDefaultValuesAttribute() {
		$values = json_decode(array_get($this->attributes, 'default_values'), true);

		return var_or($values, []);
	}
    public function offerTags() {
        return $this->hasMany('App\Entities\OfferTag');
    }
}
