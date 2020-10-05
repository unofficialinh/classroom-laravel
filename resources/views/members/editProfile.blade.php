@extends('layouts.template', ['title'=>'Edit Profile'])

@section('heading')
    Edit Your Profile
@endsection

@section('content')
    <div class="jumbotron">
        <form class="form-horizontal" action="{{ route('profile/editProfile') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="username">Username:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username"
                           id="username" value="{{ Auth::user()->username }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"
                           name="name" id="name" value="{{ Auth::user()->name }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_password">New password:</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="new_password" id="new_password"
                           placeholder="Enter new password if you want to change it. You have to login again.">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_email">Email:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control"
                           name="new_email" id="new_email" value="{{ Auth::user()->email }}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_phone">Phone:</label>
                <div class="col-sm-9">
                    <input type="tel" class="form-control"
                           name="new_phone" id="new_phone" value="{{ Auth::user()->phone }}">
                </div>
            </div>
            <div class="form-group">
                <div style="text-align: center">
                    <button type="submit" name="save" class="btn btn-default">Save</button>
                    <button type="submit" name="cancel" class="btn btn-default">
                        <a href="{{ route('profile') }}">Cancel</a>
                    </button>
                </div>
            </div>
        </form>
        <div style="text-align: center">{{ $message }}</div>
    </div>
@endsection
