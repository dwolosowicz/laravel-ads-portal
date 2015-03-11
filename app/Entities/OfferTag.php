<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class OfferTag extends Model {

    protected $fillable = [
        'tag_id'
    ];

    public function getValuesAttribute() {
        return $this->offerTagValues->lists('value', 'value');
    }

    public function getDefaultValuesAttribute() {
        if( ! $this->tag) {
            return;
        }

        return array_merge($this->tag->default_values, $this->values);
    }

    public function getNameAttribute() {
        return $this->tag->name;
    }

    public function tag() {
        return $this->belongsTo('App\Entities\Tag');
    }

	public function offer() {
        return $this->belongsTo('App\Entities\Offer');
    }

    public function offerTagValues() {
        return $this->hasMany('App\Entities\OfferTagValue');
    }

}
