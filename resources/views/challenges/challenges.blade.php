@extends('layouts.template', ['title'=>'Challenges'])

@section('heading')
    Challenges
@endsection

@section('content')
    @if (Auth::user()->role == 'teacher')
        <a href="{{ route('challenges/newChallenge') }}">+ Add new challenge</a><br><br>
    @endif
    @foreach($challenges as $challenge)
        <div class="panel-group col-sm-offset-1 col-sm-10">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <b>{{ $challenge->name }}</b>
                </div>
                <div class="panel-body">
                    Deadline: {{ $challenge->deadline }}<br>
                    Hint: {{ $challenge->hint }}<br><br>
                    <form class="form-horizontal" action="{{ route('challenges/submit', ['id'=>$challenge->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="answer">Your answer:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="answer" id="answer" required>
                                <small id="helpBlock" class="form-text text-muted">
                                    You have to enter the answer with lowercase and separated by space
                                </small>
                            </div>
                            <div class="col-sm-offset-10">
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
