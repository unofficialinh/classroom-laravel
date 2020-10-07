@extends('layouts.template', ['title'=>'Execises'])

@section('heading')
    Exercise List
@endsection

@section('content')
    @if(Auth::user()->role == 'teacher')
        <a href="{{ route('exercises/newExercise') }}">+ Add new exercise</a><br><br>
    @endif
    @foreach($exercises as $exercise)
        <div class="panel-group col-sm-offset-1 col-sm-10">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <a href="{{ route('exercises/info',['id'=>$exercise->id]) }}">
                        <b>{{ $exercise->name }}</b>
                    </a>
                </div>
                <div class="panel-body">
                    Deadline: {{ $exercise->deadline }}<br>
                    Description: {{ $exercise->description }}<br>
                </div>
            </div>
        </div>
    @endforeach
@endsection
