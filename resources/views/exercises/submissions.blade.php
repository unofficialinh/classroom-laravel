@extends('layouts.template', ['title'=>'Submissions'])

@section('heading')
    Submissions
@endsection

@section('content')
    @if (Auth::user()->role == 'teacher')
        @if ($submissions ==  null)
            <div style='text-align: center'>There are no submissions!<br></div>
        @else
            @foreach ($submissions as $submission)
                <div class="panel-group col-sm-offset-1 col-sm-10">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <b>{{ \App\Models\User::find($submission->user_id)->name }}</b>
                        </div>
                        <div class="panel-body">
                            Submitted at: {{ $submission->submit_time }}<br>
                            Solution: <a href="{{ asset($submission->filepath) }}">Open</a><br>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @endif
@endsection
