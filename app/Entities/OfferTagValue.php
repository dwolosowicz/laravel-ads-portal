<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class OfferTagValue extends Model {

    protected $fillable = [
        'value'
    ];

	public function offerTag() {
        return $this->belongsTo('App\Entities\OfferTag');
    }

}
