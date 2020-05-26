<?php

use Illuminate\Database\Seeder;
use App\Questionnaire;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this -> call(QuestionnaireSeeder::class);
    }
}
