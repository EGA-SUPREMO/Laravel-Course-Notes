@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Questionnaire</div>

                <div class="card-body">
                    <form action="/questionnaires" method="POST">
                        @csrf
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

                        <button type="submit" class="btn btn-primary">Create Questionnaire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
