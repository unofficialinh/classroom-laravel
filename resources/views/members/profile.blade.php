@extends('layouts.template', ['title'=>'Profile'])

@section('heading')
    Profile
@endsection

@section('content')
    @php($member = App\Models\User::find($id));
    <div class="panel-group col-sm-offset-1 col-sm-10">
        <div class="panel panel-info">
            <div class="panel-heading">
                <b>{{ $member->name }}</b>
            </div>
            <div class="panel-body">
                Email: {{ $member->email }}<br>
                Phone: {{ $member->phone }}<br>
                Role: {{ $member->role }}<br>
            </div>
        </div><br>
        <div style="text-align: center">
            @if (Auth::user()->id == $member->id)
                <button class="btn btn-default"><a href="{{ route('profile/editProfile') }}">Edit your profile</a></button>
            @else
                <button class="btn btn-default"><a href="">Message</a></button>
                @if(Auth::user()->role == 'teacher' and $member->role == 'student')
                    <button class="btn btn-default">
                        <a href="{{ route('members/editStudentProfile',['id'=>$id]) }}">Edit student's profile</a>
                    </button>
                @endif
            @endif
        </div>
    </div>

@endsection
