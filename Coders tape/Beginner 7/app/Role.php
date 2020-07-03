<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Turn off mass assignment protection
     *
     * @var array
     */
    protected $guarded = [];
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
