@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $questionnaire -> title }}</h1>

            <form action="/survey/{{ $questionnaire -> id }}-{{ Str::slug($questionnaire -> title) }}" method="POST">
                @csrf

                @foreach($questionnaire -> questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{ $key + 1 }}. </strong>{{ $question -> question }}</div>

                        <div class="card-body">
                            @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <ul class="list-group">
                                @foreach($question -> answers as $answer)
                                    <label for="answer{{ $answer -> id }}">
                                        <li class="list-group-item">
                                            <input type="radio" class="mr-2" name="responses[{{ $key }}][answer_id]" value="{{ $answer -> id }}" id="answer{{ $answer -> id }}" {{ (old('responses.' . $key . '.answer_id')) ? 'checked' : '' }}>
                                            {{ $answer -> answer }}

                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $answer -> id }}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
                <div class="card">
                    <div class="card-header">Create Questionnaire</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Enter the title">
                            <small id="titleHelp" class="form-text text-muted">Give a good title that describes the questionnaire.</small>
                            
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input type="text" class="form-control" id="purpose" name="purpose" aria-describedby="purposeHelp" placeholder="Enter the porpuse">
                            <small id="purposeHelp" class="form-text text-muted">A good purpose will draw more attention!</small>

                            @error('purpose')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Complete Survey</button>
            </form>
        </div>
    </div>
</div>
@endsection
