@extends('layouts.template', ['title' => 'Home'])

@section('heading')
    Home
@endsection

@section('content')
    <div style="text-align: center">
        <h3>Welcome <b><i>{{ Auth::user()->name }}</i></b>!</h3><br>
    </div>

    <div class="panel-group col-sm-3">
        <div class="panel panel-info">
            <div class="panel-heading"><a href='{{ route('profile') }}'>Profile</a></div>
            <div class="panel-body" style="height: 160px">See and edit your profile</div>
        </div>
    </div>

    <div class="panel-group col-sm-3">
        <div class="panel panel-info">
            <div class="panel-heading"><a href="{{ route('members') }}">Member List</a></div>
            <div class="panel-body" style="height: 160px">
                See the member list and message other members
            </div>
        </div>
    </div>

    <div class="panel-group col-sm-3">
        <div class="panel panel-info">
            <div class="panel-heading"><a href="">Exercises</a></div>
            <div class="panel-body" style="height: 160px">See the exercise list and submit your solution</div>
        </div>
    </div>

    <div class="panel-group col-sm-3">
        <div class="panel panel-info">
            <div class="panel-heading"><a href="">Challenge</a></div>
            <div class="panel-body" style="height: 160px">Solve the challenge with everyone</div>
        </div>
    </div>
@endsection
