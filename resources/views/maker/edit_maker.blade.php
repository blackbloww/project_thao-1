@extends('layout.app')
@section('title', 'Chỉnh sửa thông tin nhà sản xuất')
@section('content')
<section class="maker-edit">
    <div class="container">
        <div class="content">
            <div class="maker-section">
                <h4>Chỉnh sửa thông tin nhà sản xuất</h4>
                <hr class="hr">
                <form action="{{ route('maker.update', $maker->id) }}" method="POST" class="maker-form">
                    @csrf
                    @method('PUT')
                      <div class="form-group__row">
                    <div class="form-group">
                        <label for="id" class="form-group__label">Mã nhà sản xuất</label>
                        <input type="text" id="maker_id" name="maker_id" 
                               value="{{ old('maker_id', str_pad($maker->id, 8, '0', STR_PAD_LEFT)) }}" 
                               class="form-group__input" readonly>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const inputId = document.querySelector(".form-group__input");
                        
                            inputId.addEventListener("click", function () {
                                alert("Bạn không thể chỉnh sửa mã nhà sản xuất!");
                            });
                        });
                        </script>
                        <div class="form-group">
                            <label for="maker_name" class="form-group__label">Tên nhà sản xuất</label>
                            <input type="text" id="maker_name" name="maker_name" value="{{ old('maker_name', $maker->maker_name) }}" class="form-group__input">
                            @error('maker_name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
        
                            <div class="form-group">
                                <label for="tel" class="form-group__label">Số điện thoại</label>
                                <input type="text" id="tel" name="tel" 
                                    value="{{ old('tel', $maker->tel) }}" class="form-group__input form-group__input--tel">
                                @error('tel')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-group__label">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $maker->email) }}" class="form-group__input form-group__input--email">
                                @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                                <span id="email-error" style="color: red;  display: block;margin-top: 5px;"></span>
                            </div>
                            <script>
                                document.getElementById("email").addEventListener("invalid", function(event) {
                                    event.preventDefault(); // Ngăn chặn thông báo mặc định của trình duyệt
                                    document.getElementById("email-error").textContent = "Email phải có ký tự '@' và đúng định dạng.";
                                });
                            </script>
                        <div class="form-group">
                            <label for="note" class="form-group__label">Ghi chú</label>
                            <textarea id="note" name="note" class="form-group__input form-group__input--note">{{ old('note', $maker->note) }}</textarea>
                            @error('note')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>                        
                    </div>                    
                    <div class="customer-actions">
                        <button type="submit" class="btn-update">Cập nhật</button>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
</section>
@endsection
