<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('questionnaires')->insert([
    		'user_id' => 1,
    		'title' => Str::random(10),
    		'purpose' => Str::random(10),
    	]);
    }
}
