<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Đăng ký')</title>
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
                </div>
            </div>
        </div>
    </header>

    <form action="{{ route('store') }}" method="POST" class="registration-form-custom">
        @csrf
        <h4 class="form-title-custom">Đăng ký thành viên</h4>
        <div class="form-content-custom">
            <div class="form-group-custom">
                <input id="username" type="text" placeholder=" " name="username" value="{{ old('username') }}">
                <label for="username">Tên tài khoản</label>
                <div class="error-message">
                <x-input-error :messages="$errors->get('username')" class="error-message" />
                </div>
            </div>
            <div class="form-group-custom">
                <input id="password" type="password" placeholder=" " name="password">
                <label for="password">Mật khẩu</label>
                <div class="error-message">
                <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>
            </div>
            <div class="form-group-custom">
                <input id="email" type="email" placeholder=" " name="email" value="{{ old('email') }}">
                <label for="email">Email</label>
                <div class="error-message">
                <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>
            </div>
            <div class="form-group-custom">
                <input id="address" type="text" placeholder=" " name="address" value="{{ old('address') }}">
                <label for="address">Địa chỉ</label>
                <div class="error-message">
                <x-input-error :messages="$errors->get('address')" class="error-message" />
                </div>
            </div>
            <div class="form-group-custom">
                <input id="phone" type="text" placeholder=" " name="phone" value="{{ old('phone') }}">
                <label for="phone">Số điện thoại</label>
                <div class="error-message">
                <x-input-error :messages="$errors->get('phone')" class="error-message" />
                </div>
            </div>
        </div>
        <div class="form-actions-custom">
            <button type="submit" class="submit-btn-custom">Đăng ký</button>
        </div>
    </form>
    
    <footer style="position: absolute; bottom: 0; width: 100%; text-align: center; color: #fff; background: #343a40; padding: 20px;">
        <span>
          Copyright © Thảo nè All Rights Reserved.
        </span>
    </footer>
</body>
</html>
