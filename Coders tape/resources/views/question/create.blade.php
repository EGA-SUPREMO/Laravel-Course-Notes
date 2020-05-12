@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new question</div>

                <div class="card-body">
                    <form action="/questionnaires/{{ $questionnaire -> id }}/questions" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" name="question[question]" aria-describedby="questionHelp" placeholder="Enter the question">
                            <small id="questionHelp" class="form-text text-muted">Ask the question in a clear everybody would understand.</small>
                            
                            @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                <small id="choicesHelp" class="form-text text-muted">Give choices that give you the most insight into your question.</small>
                                @for($i = 0; $i < 4; $i++)
                                    <div class="form-group">
                                        <label for="answer{{ $i }}">Choice {{ $i + 1 }}</label>
                                        <input type="text" class="form-control" id="answer{{ $i }}" name="answers[][]" aria-describedby="choiceHelp" placeholder="Enter the question">
                                        
                                        @error('answers.'. $i . 'answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endfor
                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Questionnaire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
