<?php

use App\Questionnaire;
use App\Question;
use App\Answer;

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
        factory(Questionnaire::class, 2) -> create() -> each(function ($questionnaire) {
            factory(Question::class, 3) -> create(['questionnaire_id' => $questionnaire -> id]) -> each(function ($question) {
                factory(Answer::class, 4) -> create(['question_id' => $question -> id]);
            });
        });
    }
}
