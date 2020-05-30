<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SurveyResponse;
use App\Survey;
use App\Question;
use App\Answer;

use Faker\Generator as Faker;

$factory->define(SurveyResponse::class, function (Faker $faker) {
    return [
    	'survey_id' => factory(Survey::class),
    	'question_id' => factory(Question::class),
    	'answer_id' => factory(Answer::class),
    ];
});
