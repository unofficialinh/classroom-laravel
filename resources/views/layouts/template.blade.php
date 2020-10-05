<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <title>{{ $title }}</title>
</head>
<body>
@include("layouts.header")
{{--<div style="background-image: url('public/images/background.jpg') }};"></div>--}}
<div class="container">
    <div class="page-header">
        <h1>@yield('heading')</h1>
    </div>
    @yield('content')
</div>
</body>
