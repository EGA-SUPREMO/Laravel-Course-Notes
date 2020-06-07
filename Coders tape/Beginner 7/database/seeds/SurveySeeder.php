<?php

use App\Survey;
use App\SurveyResponse;

use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    private $lastQuestionId;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Survey::class, 10) -> create(['questionnaire_id' => 1]) -> each(function ($survey) {
            factory(SurveyResponse::class, 3) -> create([
            	'survey_id' => $survey -> id,
            	'question_id' => $this -> randValue('QUESTION'),
            	'answer_id' => $this -> randValue('ANSWER', $this -> lastQuestionId),
            ]);
        });
    }

    private function randValue(string $constantName, int $offset = 0): int
    {
        $this -> lastQuestionId = rand(1, config("constants.$constantName"."_SEEDER_AMOUNT")) + $offset*config("constants.ANSWER_SEEDER_AMOUNT");
        
    	return $this -> lastQuestionId;
    }
}
