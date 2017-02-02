<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
      'title',
      'body',
      'published_at',
      'user_id' // temporary!!
    ];

    // Makes published_at a Carbon instance
    protected $dates = ['published_at'];

    /**
     * Scope queries to articles that have been published
     *
     * @param $query
     */
    public function scopePublished($query)
    {
      $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Scope queries to articles that have NOT been published
     *
     * @param $query
     */
    public function scopeUnpublished($query)
    {
      $query->where('published_at', '>=', Carbon::now());
    }

    /**
     * Set the published_at attribute into Carbon formatting
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
      $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * Get the published_at attribute.
     *
     * @param $date
     */
    public function getPublishedAtAttribute($date)
    {
      return new Carbon($date);
    }

    /**
     * An article belongs to a single user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    /**
     * Get the tags asociated with the given article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
      return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag ids associated with the current article
     *
     * @return array
     */
    public function getTagListAttribute()
    {
      return $this->tags->pluck('id')->all();
    }
}
