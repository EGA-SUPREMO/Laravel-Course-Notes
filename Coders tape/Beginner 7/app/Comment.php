<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/**
	 * @var array
	 */
	protected $guarded = [];
	
    public function commentable()
    {
        return $this->morphTo();
    }
}
