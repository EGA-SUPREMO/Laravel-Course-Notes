<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * Turn off mass assignment protection
     *
     * @var array
     */
    protected $guarded = [];

    protected $dates = ['birth'];
    
    public function path()
    {
        return url('/authors/'. $this->id);
    }
}
