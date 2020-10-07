@extends('layouts.template',['title'=>'New Challenge'])

@section('heading')
    New Challenge
@endsection

@section('content')
    @if(Auth::user()->role == 'teacher')
    <div class="jumbotron">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"
                           name="name" id="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="deadline">Deadline:</label>
                <div class="col-sm-9">
                    <input type="datetime-local" class="form-control"
                           name="deadline" id="deadline">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="hint">Hint:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"
                           name="hint" id="hint" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="file">Answer file:</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" name="file" id="file" required>
                    <small id="helpBlock" class="form-text text-muted">
                        Please upload text file (with extension .txt)!
                    </small>
                </div>
            </div>

            <div class="form-group">
                <div style="text-align: center">
                    <button type="submit" name="add" class="btn btn-default">Add</button>
                    <button class="btn btn-default"><a href="{{ route('challenges') }}">Cancel</a></button>
                </div>
            </div>

            @if ($message != '')
                <div style="text-align: center">
                    <i>{{ $message }}</i>
                </div>
            @endif
        </form>
    </div>
    @endif
@endsection
