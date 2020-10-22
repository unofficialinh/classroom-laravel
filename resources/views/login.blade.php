{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label value="{{ __('Username') }}" />--}}
{{--                <x-jet-input class="block mt-1 w-full" type="text" name="username" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label value="{{ __('Password') }}" />--}}
{{--                <x-jet-input class="block mt-1 w-full" type="password" name="password" required />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-jet-button class="ml-4">--}}
{{--                    {{ __('Login') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}

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

