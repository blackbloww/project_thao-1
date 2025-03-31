@extends('layout.app')

@section('title', 'Đổi Mật Khẩu')

@section('content')
<section class="change-password">
    <div class="container">
        <div class="content">
            <h4>Đổi mật khẩu</h4>
            <hr class="hr">

            @if(session('success'))
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            title: "Thành công!",
                            text: "{{ session('success') }}",
                            icon: "success",
                            confirmButtonColor: "#8B3A3A", 
                            confirmButtonText: "OK"
                        });
                    });
                </script>
            @endif

            {{-- @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif --}}

            <form method="POST" class="change-form" action="{{ route('customer.change_password.post') }}">
                @csrf
                <div class="form-group">
                    <label for="current_password">Mật khẩu hiện tại</label>
                    <input type="password" id="current_password" name="current_password">
                    <div class="error-message"><x-input-error :messages="$errors->get('current_password')" /></div>
                </div>

                <div class="form-group">
                    <label for="new_password">Mật khẩu mới</label>
                    <input type="password" id="new_password" name="new_password">
                    <div class="error-message"><x-input-error :messages="$errors->get('new_password')" /></div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Xác nhận mật khẩu</label>
                    <input type="password" id="confirm_password" name="confirm_password">
                    <div class="error-message"><x-input-error :messages="$errors->get('confirm_password')" /></div>
                </div>
                <div class="customer-actions ">
                <button type="submit" class="change_password">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
</section>
@endsection
