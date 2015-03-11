<?php namespace App\Entities;

use App\Entities\NullObjects\NullOfferTag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Carbon\Carbon;
use Config;

class Offer extends Model
{

    /**
     * Configuration variables
     */
    protected $fillable
        = [
            'title',
            'content',
            'expires_at'
        ];

    protected $dates
        = [
            'expires_at'
        ];

    /**
     * Custom setters / getters
     */
    public function expired()
    {
        return $this->expires_at->lte(Carbon::now());
    }

    public function expire()
    {
        if ($this->expired()) {
            return;
        }

        $this->attributes['expires_at'] = Carbon::now();
    }

    public function offerTag($tagId)
    {
        $offerTag = $this->offerTags()->where('tag_id', $tagId)->first();

        return var_or($offerTag, new NullOfferTag);
    }

    /**
     * Scopes
     */
    public function scopeNotExpired($query)
    {
        $query->where('expires_at', '>', Carbon::now());
    }

    public function scopeTitled($query, $title)
    {
        $query->where('title', 'like', "%$title%");
    }

    public function scopeTagged($query, $tags)
    {
        $tagValues = array_map(function($tag) {
            return array_get(explode(': ', $tag), 1);
        }, $tags);

        $query->whereHas("offerTags", function($q) use ($tagValues) {
            $q->whereHas("offerTagValues", function($q) use($tagValues) {
                $q->whereIn('value', $tagValues);
            });
        });
    }

    public function scopeRecent($query)
    {
        $query->orderBy('expires_at', 'DESC');
    }

    /**
     * Custom attributes
     */
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function setExpiresAtAttribute($expiresAt)
    {
        $this->attributes['expires_at']
            = Carbon::createFromFormat(Config::get('patterns.date.php'),
            $expiresAt);
    }

    public function getExpiresAtAttribute()
    {
        return Carbon::parse(array_get($this->attributes, 'expires_at'));
    }

    public function getTagsAttribute()
    {
        return $this->offerTags->lists('tag_id');
    }

    /**
     * Relations
     */
    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }

    public function offerTags()
    {
        return $this->hasMany('App\Entities\OfferTag');
    }

    /**
     * Entity configuration
     */
    public function getRouteKey()
    {
        return $this->attributes['slug'];
    }
}
