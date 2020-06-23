<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

use App\Events\NewSurveyHasCompletedEvent;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug)
    {
    	$questionnaire -> load('questions.answers');

    	return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
    	$validatedData = request() -> validate([
    		'surveyResponses.*.question_id' => 'required',
    		'surveyResponses.*.answer_id' => 'required',
    		'survey.name' => 'required',
    		'survey.email' => 'required|email',
    	]);

        $survey = $questionnaire -> surveys() -> create($validatedData['survey']);

        event(new NewSurveyHasCompletedEvent($survey, $validatedData['surveyResponses']));

    	//return 'ty';
    }
}
