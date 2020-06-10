<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    public function questionnaires()
    {
        return $this->morphByMany(Questionnaire::class, 'labelable');
    }
    public function questions()
    {
        return $this->morphByMany(Question::class, 'labelable');
    }
    public function users()
    {
        return $this->morphByMany(User::class, 'labelable');
    }
    
}
