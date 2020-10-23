<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <title>Login</title>
</head>
<body>
<div class="container" style="margin-top: 150px">
    <div class="jumbotron">
        <form class="form-horizontal" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="username">Username:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>
            <div class="form-group">
                <div style="text-align: center">
                    <button type="submit" name="login" class="btn btn-default">Log in</button>
                </div>
            </div>
        </form>
        <div style="text-align: center">OR</div>
        <div class="form-group">
            <div style="text-align: center">
                <a href="{{url('/redirect')}}" class="btn btn-primary">Login with Facebook</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

