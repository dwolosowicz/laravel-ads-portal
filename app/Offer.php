<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Carbon\Carbon;
use Config;

class Offer extends Model {

	protected $fillable = [
		'title',
		'content',
		'expires_at'
	];

	protected $dates = [
		'expires_at'
	];

	public function expired() {
		return $this->expires_at->lte(Carbon::now());
	}

	public function expire() {
		if($this->expired()) {
			return;
		}

		$this->attributes['expires_at'] = Carbon::now();
	}

	public function scopeNotExpired($query) {
		$query->where('expires_at', '>', Carbon::now());
	}

	public function scopeTitled($query, $title) {
		$query->where('title', 'like', "%$title%");
	}

	public function scopeRecent($query) {
		$query->orderBy('expires_at', 'DESC');
	}

	public function setTitleAttribute($title) {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function setExpiresAtAttribute($expiresAt) {
    	$this->attributes['expires_at'] = Carbon::createFromFormat(Config::get('patterns.date.php'), $expiresAt);
    }

    public function getExpiresAtAttribute() {
    	$expiresAt = isset($this->attributes['expires_at']) ? $this->attributes['expires_at'] : null;

    	return Carbon::parse($expiresAt);
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function getRouteKey() {
    	return $this->attributes['slug'];
    }
}
