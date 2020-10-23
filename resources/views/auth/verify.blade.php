<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <title>Two Factor Authentication</title>
</head>
<body>
<div class="container" style="margin-top: 150px">
    <div class="jumbotron">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <form role="form" method="post" action="{{ route('verify') }}">
            {{ csrf_field() }}
            <div>
                <b>Authentication code</b>
            </div><br>
            <div class="col-sm-10">
                <input type="text" name="code" class="form-control" placeholder="123456" autocomplete="off" maxlength="6" id="otp">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Verify</button>
            </div>
            <div class="text-muted">
                <small><i>
                Open the two-factor authentication app on your device to view your authentication code and verify your identity.
                </i></small>
            </div>
        </form>
    </div>
</div>
</body>
</html>
