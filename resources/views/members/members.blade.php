@extends('layouts.template', ['title'=>'Members'])

@section('heading')
    Member List
@endsection

@section('content')
    @if(Auth::user()->role == 'teacher')
        <a href="{{ route('addNewStudent') }}">+ Add new student</a><br><br>
    @endif
    @foreach($members as $member)
        <div class="panel-group col-sm-offset-1 col-sm-10">
            <div class="panel panel-info">
                <div class="panel-heading">
                    @if (Auth::user()->username == $member->username)
                        <a href="{{ route('profile') }}"><b>{{ $member->name }}</b></a>
                    @else
                        <a href="{{ route('members/profile',['id'=>$member->id]) }}"><b>{{ $member->name }}</b></a>
                    @endif
                </div>
                <div class="panel-body">
                    Email: {{ $member->email }}<br>
                    Phone: {{ $member->phone }}<br>
                    Role: {{ $member->role }}<br>
                </div>
            </div>
        </div>
    @endforeach
@endsection
