@extends('layouts.template', ['title'=>'Exercise'])

@section('heading')
    Exercise
@endsection

@section('content')
    @php($exercise = \App\Models\Exercise::find($id))
    <div class="panel-group col-sm-offset-1 col-sm-10">
        <div class="panel panel-info">
            <div class="panel-heading">
                <b>{{ $exercise->name }}</b>
            </div>
            <div class="panel-body">
                Deadline: {{ $exercise->deadline }}<br>
                Description: {{ $exercise->description }}<br>
                Problem: {{ 'Problem' }}<br>
            </div>
        </div>
    </div>
    @if(Auth::user()->role == 'teacher')
        <a href="{{ route('exercises/submissions',['id'=>$id]) }}">Submissions</a><br><br>
    @else
        <form class="form-horizontal" action="{{ route('exercises/submit',['id'=>$id]) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="fileToUpload">Submit:</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required>
                    <small id="helpBlock" class="form-text text-muted">

                    </small>
                </div>
                <div class="col-sm-offset-10">
                    <button type="submit" name="save" class="btn btn-default">Save</button>
                </div>
        </form>
    @endif
@endsection
