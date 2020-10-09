@extends('layouts.template',['title'=>'Messages'])

@section('heading')
    Messages
@endsection

@section('content')
    <div class="jumbotron">
        <form class="form-horizontal" action="{{ route('members/newMassage',['id'=>$id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="message">New massage:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="message" id="message" required>
                </div>
                <div class="col-sm-offset-8">
                    <button type="submit" name="send" class="btn btn-default">Send</button>
                </div>
            </div>
        </form>
    </div><br>

    @foreach($messages as $message)
        @if($message->send_id == Auth::user()->id)
            <div class="panel-group col-sm-offset-2 col-sm-10">
                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: right">
                        <b>{{ \App\Models\User::find($message->send_id)->name }}</b><br>
                        <small><i>{{ $message->send_time_string }}</i></small>
                    </div>
                    <div class="panel-body" style="text-align: right">
                        <div style="float: left">
                            <a href="{{ route('members/editMessage',['id'=>$message->id]) }}">
                                <span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{ route('members/deleteMessage',['id'=>$message->id]) }}">
                                <span class="glyphicon glyphicon-remove" style="color: red"></span></a>
                        </div>
                        {{ $message->message }}
                    </div>
                </div>
            </div>
        @else
            <div class="panel-group col-sm-10">
                <div class="panel panel-info">
                    <div class="panel-heading" style="text-align: left">
                        <b>{{ \App\Models\User::find($message->send_id)->name }}</b><br>
                        <small><i>{{ $message->send_time_string }}</i></small>
                    </div>
                    <div class="panel-body" style="text-align: left">
                        {{ $message->message }}
                    </div>
                </div>
            </div>
        @endif
{{--        <div class="panel-group">--}}
{{--            <div class="panel panel-info">--}}
{{--                <div class="panel-heading" style="text-align: {{ $align }}">--}}
{{--                    <b>{{ \App\Models\User::find($message->send_id)->name }}</b><br>--}}
{{--                    <small><i>{{ $message->send_time_string }}</i></small>--}}
{{--                </div>--}}
{{--                <div class="panel-body" style="text-align: {{ $align }}">--}}
{{--                    @if($align == 'right')--}}
{{--                        <div style="float: left">--}}
{{--                            <a href="{{ route('members/editMessage',['id'=>$message->id]) }}">--}}
{{--                                <span class="glyphicon glyphicon-pencil"></span></a>--}}
{{--                            <a href="{{ route('members/deleteMessage',['id'=>$message->id]) }}">--}}
{{--                                <span class="glyphicon glyphicon-remove" style="color: red"></span></a>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    {{ $message->message }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    @endforeach
@endsection

