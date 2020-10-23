@extends('layouts.template',['title'=>'Two Factor Authentication'])

@section('heading')
    Scan Barcode
@endsection

@section("content")
    <div class="jumbotron">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <form role="form" method="post" action="{{ route('2faEnable') }}">
            {{ csrf_field() }}
            <div>
                Scan the image above with the two-factor authentication app on your phone:
            </div><br>
            <div class="text-center">
                <img src="{{ $qrCodeUrl }}" />
            </div><br>
            <b>Enter the six-digit code from the application:</b>
            <div class="text-muted">
                <small>
                    <i>After scanning the barcode image, the app will display a six-digit code that you can enter below</i>
                </small>
            </div><br>
            <div class="form-group col-sm-10">
                <input type="text" name="code" class="form-control" placeholder="123456" autocomplete="off" maxlength="6">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Enable</button>
                <a href="{{ route('profile') }}" class="btn btn-secondary float-right">Cancel</a>
            </div>
        </form>
    </div>
@endsection
