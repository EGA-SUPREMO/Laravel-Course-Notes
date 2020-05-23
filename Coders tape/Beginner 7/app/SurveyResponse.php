<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $guarded = [];

    public function survey()
    {
    	return $this -> belongsTo(Survey::class);
    }
    public function question()
    {
    	return $this -> belongsTo(Question::class);
    }
    public function answer()
    {
    	return $this -> belongsTo(Answer::class);
    }
}
