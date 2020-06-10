<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $guarded = [];

    protected $casts = [
    	'active' => 'boolean',
    ];

    public function scopeByActivity($query, $isActive)
    {
    	return $query -> where('active', $isActive);
    }
}
