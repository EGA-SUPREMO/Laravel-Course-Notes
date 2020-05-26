<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Questionnaire;
use Faker\Generator as Faker;

$factory->define(Questionnaire::class, function (Faker $faker) {
    return [
    	'user_id' => 1,
    	'title' => $faker -> sentence(3),
    	'purpose' => $faker -> sentence(3),
    ];
});
