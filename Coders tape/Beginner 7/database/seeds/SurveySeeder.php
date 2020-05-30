<?php

use App\Survey;
use App\SurveyResponse;

use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Survey::class, 10) -> create(['questionnaire_id' => 1]) -> each(function ($survey) {
    		$randomQuestionId =  
            factory(SurveyResponse::class, 3) -> create([
            	'survey_id' => $survey -> id,
            	'question_id' => randValue('QUESTION'),
            	'answer_id' => randValue('ANSWER'),
            ]);
        });
    }

    private function randValue($constantName, $offset = 0): int
    {
    	return rand(1, config("constants.$constantName_SEEDER_AMOUNT") . $offset*config("constants.$constantName_SEEDER_AMOUNT");
    }
}
