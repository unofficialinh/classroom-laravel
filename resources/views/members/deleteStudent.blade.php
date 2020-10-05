@extends('layouts.template', ['title'=>'Delete Profile'])

@section('heading')
    Delete Student's Profile
@endsection

@section('content')
    @php($student = App\Models\User::find($id))
    <div class="jumbotron">
        <div style="text-align: center">
            Are you sure when delete this student's profile?
        </div><br>
        <form class="form-horizontal" action="{{ route('members/deleteStudent',['id'=>$id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="username">Username:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username"
                           id="username" value="{{ $student->username }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"
                           name="name" id="name" value="{{ $student->name }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control"
                           name="email" id="email" value="{{ $student->email }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="phone">Phone:</label>
                <div class="col-sm-9">
                    <input type="tel" class="form-control"
                           name="phone" id="phone" value="{{ $student->phone }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <div style="text-align: center">
                    <button type="submit" name="save" class="btn btn-default">Delete</button>
                    <button type="submit" name="cancel" class="btn btn-default">
                        <a href="{{ route('members/profile',['id'=>$id]) }}">Cancel</a>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

