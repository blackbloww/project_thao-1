<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Đăng nhập')</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="content">
                <div class="sec">
                    <div class="header_title">
                        <span>Bán hàng</span>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </header>
    <form action="{{ route('login') }}" method="POST" class="login-form">
        @csrf
        <div class="form-content-custom">
            <div class="form-group-custom">
                <input id="username" type="text" name="username" value="{{ old('username') }}"> <!-- Giữ lại giá trị nhập vào -->
                <label for="username">Tên tài khoản</label>
                <!-- Sử dụng x-input-error component để hiển thị lỗi -->
                {{-- <x-input-error :messages="$errors->get('username')"  /> --}}
                <div class="error-message"><x-input-error :messages="$errors->get('username')"  /></div>
            </div>
    
            <div class="form-group-custom">
                <input id="password" type="password" name="password"> <!-- Mật khẩu không hiển thị lại vì bảo mật -->
                <label for="password">Mật khẩu</label>
                <!-- Sử dụng x-input-error component để hiển thị lỗi -->
                <div class="error-message">
                <x-input-error :messages="$errors->get('password')"/>
                </div>
            </div>
            <!-- Hiển thị lỗi cho lỗi đăng nhập -->
            @if ($errors->has('login_error'))
            <div class="alert alert-danger input-error-custom">{{ $errors->first('login_error') }}</div> 
        @endif
        </div>
    
        <div class="btnDangKy">
            <button type="submit">Đăng nhập</button>
        </div>
    </form>

    <footer style="position: absolute; bottom: 0; width: 100%; text-align: center; color: #fff; background: #343a40; padding: 20px;">
        <span>
          Copyright © Thảo nè All Rights Reserved.
        </span>
    </footer>

</body>
</html>
