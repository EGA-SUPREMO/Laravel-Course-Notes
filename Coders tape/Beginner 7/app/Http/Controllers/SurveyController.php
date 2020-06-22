<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Questionnaire;

use App\Mail\NewSurveyMail;

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
    	$survey -> responses() -> createMany($validatedData['surveyResponses']);

        Mail::to('you@at.com') -> send(new NewSurveyMail($survey));

    	return 'ty';
    }
}
