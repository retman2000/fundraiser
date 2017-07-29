<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/**
     * Get the fundraiser that owns the comment.
     */
    public function fundraiser()
    {
        return $this->belongsTo('App\Fundraiser');
    }
    
	/**
     * Get the fundraiser that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
