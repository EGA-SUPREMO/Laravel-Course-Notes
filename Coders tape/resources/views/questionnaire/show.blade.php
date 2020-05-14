@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire -> title }}</div>

                <div class="card-body">
                    <a href="{{ $questionnaire -> id }}/questions/create" class="btn btn-dark">Create a new question</a>
                    <a href="/survey/{{ $questionnaire -> id }}-{{ Str::slug($questionnaire -> title) }}" class="btn btn-dark">Take Survey</a>
                </div>
            </div>
            @foreach($questionnaire -> questions as $question)
                <div class="card mt-4">
                    <div class="card-header">{{ $question -> question }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($question -> answers as $answer)
                                <li class="list-group-item">{{ $answer -> answer }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-footer">
                        <form action="{{ $questionnaire -> id }}/questions/{{ $question -> id }}" method="POST">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete Question</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
