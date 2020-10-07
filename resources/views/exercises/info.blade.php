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
                Problem: <a href="{{ asset($exercise->filepath) }}">Download</a>
                <br><br>
                @if(Auth::user()->role == 'student')
                    <form class="form-horizontal" action="{{ route('exercises/submit',['id'=>$id]) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="file">Submit:</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="file" id="file" required>
                                <small id="helpBlock" class="form-text text-muted">

                                </small>
                            </div>
                            <div class="col-sm-offset-10">
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    @if(Auth::user()->role == 'teacher')
        <div style="text-align: center">
            <button type="submit" name="save" class="btn btn-default">
                <a href="{{ route('exercises/submissions',['id'=>$id]) }}">Submissions</a>
            </button>
        </div>
    @endif
@endsection
