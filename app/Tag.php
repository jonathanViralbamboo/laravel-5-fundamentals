<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  /**
   * Get the articles associated with the given tags
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
    public function articles()
    {
      return $this->belongsToMany('App\Article');
    }
}
