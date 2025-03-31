<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Chủ')</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
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
    <main class="main">
        <section class="sec-head">
            <div class="container">
                <div class="content">
                    <div class="sidebar">
                    <div class="left">
                        <ul class="custom_list">
                            <li class="custom_item">Trang chủ</li>
                            <li class="custom_item">
                                <a href="{{ route('customer.index') }}">Thông tin khách hàng</a>
                            </li>
                            <li class="custom_item">
                                <a href="{{ route('maker.index') }}">Thông tin nhà sản xuất</a>
                            </li>
                            <li class="custom_item">
                                <a href="{{ route('category.index') }}">Loại sản phẩm</a>
                            </li>
                            <li class="custom_item">
                                <a href="{{ route('product.index') }}">Sản phẩm</a>
                            </li> 
                            <li class="custom_item">
                                <a href="{{ route('customer.change_password') }}">Đổi mật khẩu</a>
                            </li>
                            <li class="custom_item">
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="right">
                        @yield('content') 
                    </div>
                    </div>
                </div>  
            </div>
        </section>
    </main>
    <!-- <footer>
        <p>&copy; 2025 - Tất cả quyền được bảo lưu.</p>
    </footer> -->
</body>
</html>
