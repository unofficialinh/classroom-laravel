@extends('layouts.template', ['title'=>'Edit Profile'])

@section('heading')
    Edit Student's Profile
@endsection

@section('content')
    @if(Auth::user()->role == 'teacher')
    @php($student = App\Models\User::find($id))
    <div class="jumbotron">
        <form class="form-horizontal" action="{{ route('members/editStudentProfile',['id'=>$id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_username">Username:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="new_username"
                           id="new_username" value="{{ $student->username }}" required>
                    @error('new_username')
                    <small id="helpBlock" style="color: #b32c2c" class="form-text text-muted">
                        <i>{{ $message }}</i>
                    </small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_name">Name:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"
                           name="new_name" id="new_name" value="{{ $student->name }}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_password">New password:</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="new_password" id="new_password"
                           placeholder="Enter new password if you want to change it">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_email">Email:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control"
                           name="new_email" id="new_email" value="{{ $student->email }}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_phone">Phone:</label>
                <div class="col-sm-9">
                    <input type="tel" class="form-control"
                           name="new_phone" id="new_phone" value="{{ $student->phone }}">
                </div>
            </div>
            <div class="form-group">
                <div style="text-align: center">
                    <button type="submit" name="save" class="btn btn-default">Save</button>
                    <button type="submit" name="cancel" class="btn btn-default">
                        <a href="{{ route('members/profile',['id'=>$id]) }}">Cancel</a>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endif
@endsection
