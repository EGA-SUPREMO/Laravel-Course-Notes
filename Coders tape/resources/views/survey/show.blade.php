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
                    <div class="card-header">Your information</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="titleHelp" placeholder="Enter the name">
                            <small id="titleHelp" class="form-text text-muted">Your name.</small>
                            
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter the porpuse">
                            <small id="emailHelp" class="form-text text-muted">Your email, so we can contact you!</small>

                            @error('email')
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
