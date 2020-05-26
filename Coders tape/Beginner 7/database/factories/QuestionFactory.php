<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use App\Questionnaire;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
    	'question' => $faker -> sentence(4),
    	'questionnaire_id' => factory(Questionnaire::class),
    ];
});
