<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
    	'answer' => $faker -> sentence(2),
    	'question_id' => factory(Question::class),
    ];
});
