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

    @endif
@endsection
