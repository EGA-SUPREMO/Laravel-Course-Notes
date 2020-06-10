<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

	public function questionnaire()
	{
		return $this -> belongsTo(Questionnaire::class);
	}

	public function answers()
	{
		return $this -> hasMany(Answer::class);
	}

	public function surveyResponses()
	{
		return $this -> hasMany(SurveyResponse::class);
	}
    public function labels()
    {
        return $this->morphToMany(Label::class, 'labelable');
    }
}
