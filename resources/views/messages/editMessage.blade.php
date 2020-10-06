@extends('layouts.template',['title'=>'Edit Message'])

@section('heading')
    Edit message
@endsection

@section('content')
    @php($message = \App\Models\Message::find($id))
    <div class="jumbotron">
        <form class="form-horizontal" action="{{ route('members/editMessage',['id'=>$id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <input type="text" class="form-control" name="message"
                           value="{{ $message->message }}" required>
                </div>
                <div class="col-sm-offset-8">
                    <button type="submit" name="save" class="btn btn-default">Save</button>
                    <button class="btn btn-default">
                        <a href="{{ route('members/messages', ['id'=>$message->receive_id]) }}">Cancel</a>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
