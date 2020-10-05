@extends('layouts.template', ['title'=>'Add new student'])

@section('heading')
    Add new student
@endsection

@section('content')
    <div class="jumbotron">
        <form class="form-horizontal" action="{{ route('addNewStudent') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_username">Tên đăng nhập:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"
                           name="new_username" id="new_username" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_name">Họ tên:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"
                           name="new_name" id="new_name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_password">Mật khẩu:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control"
                           name="new_password" id="new_password" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_email">Email:</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control"
                           name="new_email" id="new_email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="new_phone">Số điện thoại:</label>
                <div class="col-sm-8">
                    <input type="tel" class="form-control"
                           name="new_phone" id="new_phone">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-2">
                    <button type="submit" name="save" class="btn btn-default">Lưu</button>
                    <button class="btn btn-default"><a href="{{ route('members') }}">Hủy</a></button>
                </div>
            </div>
        </form>
@endsection
