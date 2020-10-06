@extends('layouts.template', ['title'=>'New Exercise'])

@section('heading')
    New Exercise
@endsection

@section('content')
    @if(Auth::user()->role == 'teacher')
        <div class="jumbotron">
            <form class="form-horizontal" action="{{ route('exercises/newExercise') }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-2" for="exerciseName">Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                               name="exerciseName" id="exerciseName" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="deadline">Deadline:</label>
                    <div class="col-sm-8">
                        <input type="datetime-local" class="form-control"
                               name="deadline" id="deadline" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="description">Description:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                               name="description" id="description" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="fileToUpload">Problem:</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required>
                    </div>
                </div>
                <div class="form-group">
                    <div style="text-align: center">
                        <button type="submit" name="add" class="btn btn-default">Add</button>
                        <button class="btn btn-default"><a href="{{ route('exercises') }}">Cancel</a></button>
                    </div>
                </div>
            </form>
        </div>
    @endif
@endsection
