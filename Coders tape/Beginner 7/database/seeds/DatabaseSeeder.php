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
    	factory(Questionnaire::class, 10)->create();
    }
}
