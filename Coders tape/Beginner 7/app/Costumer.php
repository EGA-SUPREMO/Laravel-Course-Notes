<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $guarded = [];

    public function scopeByActivity($query, $isActive)
    {
    	return $query -> where('active', $isActive);
    }
}
