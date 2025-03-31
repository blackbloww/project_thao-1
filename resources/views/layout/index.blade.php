<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Chủ')</title>
    <link rel="stylesheet" href="{{ asset('assets/styleindex.css') }}">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="content">
                <div class="sec">
                <div class="header_title">
                    <span>Trang bán hàng</span>
                </div>
                <div class="btn">
                    <form method="POST" action="{{ route('logout') }}">
                    <span>Chào bạn, {{ Auth::user()->username }}</span>
                    @csrf   
                    <button type="submit" class="btn-red">Đăng xuất</button>
                </form>
                </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
