@extends('layout.app')
@section('title', 'Đăng ký nhà sản xuất')
@section('content')
<section class="maker-edit">
    <div class="container">
        <div class="content">
            <div class="maker-section">
                <h4>Đăng ký nhà sản xuất</h4>
                <hr class="hr">
        <form action="{{ route('maker.store') }}" method="POST">
        @csrf
    
          <div class="form-group__row">
            <div class="form-group">
                <label for="maker_name" class="form-group__label">Tên nhà sản xuất</label>
                <input type="text" id="maker_name" name="maker_name"  class="form-group__input"  value="{{ old('maker_name') }}">
                @error('maker_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
                <div class="form-group">
                    <label for="tel" class="form-group__label">Số điện thoại</label>
                    <input type="text" id="tel" name="tel" 
                       class="form-group__input form-group__input--tel" value="{{ old('tel') }}">
                    @error('tel')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-group__label">Email</label>
                    <input type="email" id="email" name="email"  class="form-group__input form-group__input-email"value="{{ old('email') }}">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            <div class="form-group">
                <label for="note" class="form-group__label">Ghi chú</label>
                <textarea id="note" name="note" class="form-group__input form-group__input--note" value="{{ old('note') }}"></textarea>
            </div>                        
        </div>                    
        <div class="customer-actions">
            <button type="submit" class="btn-update">Đăng ký</button>
        </div>
    </form>
</div>
</div>
</div>
</section>
@endsection

