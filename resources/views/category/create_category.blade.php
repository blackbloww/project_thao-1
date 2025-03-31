@extends('layout.app')
@section('title', 'Đăng ký loại sản phẩm')
@section('content')
<section class="maker-edit">
    <div class="container">
        <div class="content">
            <div class="maker-section">
                <h4>Đăng ký loại sản phẩm</h4>
                <hr class="hr">
        <form action="{{ route('category.store') }}" method="POST">
        @csrf
    
          <div class="form-group__row">
            <div class="form-group">
                <label for="category_name" class="form-group__label">Tên loại sản phẩm</label>
                <input type="text" id="category_name" name="category_name"  class="form-group__input"  value="{{ old('category_name') }}">
                @error('category_name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
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

