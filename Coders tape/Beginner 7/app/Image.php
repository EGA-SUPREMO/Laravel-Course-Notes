<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];
    
    public function imageable()
    {
        return $this->morphTo();
    }
}
