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
/*        factory(Questionnaire::class, 2) -> create() -> each(function($questionnaire) {
            $questionnaire->questions() -> saveMany(factory(Question::class, 3) -> make()) -> each(function($question){
                $question->answers() -> saveMany(factory(Answer::class, 4)->make());
            });
        });*/
/*        factory(Questionnaire::class, 2) -> create() -> each(function ($questionnaire) {
            $questionnaire -> questions() -> createMany(factory(Question::class, 4) -> make() -> toArray());
        });*/
        factory(Questionnaire::class, 2) -> create() -> each(function ($questionnaire) {
            //dd($questionnaire);
            factory(Question::class, 3) -> create(['questionnaire_id' => $questionnaire -> id]);
        });
/*        factory(Questionnaire::class, 2) -> create() -> each(function($questionnaire) {
            $questionnaire -> questions() -> save(factory(Question::class) -> make());
        });*/
    }
}
