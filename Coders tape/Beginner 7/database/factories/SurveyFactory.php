<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Survey;
use App\Questionnaire;

use Faker\Generator as Faker;

$factory->define(Survey::class, function (Faker $faker) {
    return [
    	'name' => $faker -> name,
        'email' => $faker->unique()->safeEmail,
    	'questionnaire_id' => factory(Questionnaire::class),
    ];
});
