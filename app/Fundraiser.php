<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    /**
     * Get the comments attached to the fundraiser.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
