<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * Turn off mass assignment protection
     *
     * @var array
     */
    protected $guarded = [];
    
    public function path()
    {
        return url('/books/'. $this->id);
    }
}
