@extends('layouts.template', ['title'=>'Result'])

@section('heading')
    Result
@endsection

@section('content')
    @if($result == 'wrong')
        <div style="text-align: center">
            <p><b><i>Wrong answer!</i></b></p>
            <button class="btn btn-default"><a href="{{ route('challenges') }}">Try again</a></button>
        </div>
    @else
        <div style="text-align: center">
            <p><b><i>Correct answer!</i></b></p>
            <div class="jumbotron" style="text-align: left">
                {{ Storage::get($result) }}
            </div>
            <button class="btn btn-default"><a href="{{ route('challenges') }}">Back</a></button>
        </div>
    @endif
@endsection
