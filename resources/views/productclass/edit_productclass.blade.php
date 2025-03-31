@extends('layout.app')
@section('title', 'Chi tiết sản phẩm')
@section('content')

<section class="edit-productclass">
    <div class="container">
        <div class="content">
            <div class="sec-seven">
                <h4>Chi tiết sản phẩm</h4>
                <hr class="hr">
{{-- @php
    dd($xxx);
@endphp --}}
                <!-- Form tìm kiếm -->
                <form method="GET" class="search-form" action="{{ route('productclass.search') }}">
                    <div class="form-field">
                        <label for="product_id">Mã sản phẩm</label>
                        <select name="product_id" class="form-group__input form-group__input-maker_id1">
                            <option value="">Chọn mã sản phẩm</option>
                            @foreach($xxx as $product)
                                @if(isset($product->id) && isset($product->product_code)) 
                                    <option value="{{ $product->id }}" 
                                        {{ old('product_id', request('product_id')) == $product->id ? 'selected' : '' }}>
                                        {{ $product->product_code }}
                                    </option>
                                @else
                                    <option disabled>Lỗi dữ liệu: {{ json_encode($product) }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-buttons">
                        <button type="submit" class="btn-primery">Tìm kiếm</button>
                    </div>
                
                </form>
                
                
                @if(session('success'))
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            Swal.fire({
                                title: "Thành công!",
                                text: "{{ session('success') }}",
                                icon: "success",
                                confirmButtonColor: "#8B3A3A", 
                                confirmButtonText: "OK",
                                customClass: {
                                    popup: 'custom-popup'
                                }
                            });
                        });
                    </script>
                @endif

                <!-- Form cập nhật (dùng name="product_classes[]" để gửi mảng) -->
                <form method="POST" action="{{ route('productclass.update', $productClass->id) }}" class="edit-form">
                    @csrf
                    @method('PUT')

                    <div class="table-responsive">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Mã màu</th>
                                    <th>Màu sắc</th>
                                    <th>Kích cỡ</th>
                                    <th>Trị giá</th>
                                    <th>Đơn vị giá</th>
                                    <th>Số lượng</th>
                                    <th>Nhận xét</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($productClasses as $product)
                                    <tr>
                                        <td>{{ $product->product_code }}</td>
                                        <td>{{ $product->color_code }}</td>
                                        <td>{{ $product->color }}</td>
                                        <td>{{ $product->size }}</td>

                                        <!-- Input ẩn để giữ ID sản phẩm -->
                                        <input type="hidden" name="product_classes[{{ $product->id }}][id]" value="{{ $product->id }}">
<!-- Chi phí (cost) -->
<td>
    <input type="text" name="product_classes[{{ $product->id }}][cost]" 
           value="{{ number_format(old("product_classes.$product->id.cost", $product->cost), 0, '.', ',') }}" 
           class="editable-input currency-format">
    @error("product_classes.{$product->id}.cost")
        <div class="error-message" style="color: red;">{{ $message }}</div>
    @enderror
</td>

<!-- Giá bán (price) -->
<td>
    <input type="text" name="product_classes[{{ $product->id }}][price]" 
           value="{{ number_format(old("product_classes.$product->id.price", $product->price), 0, '.', ',') }}" 
           class="editable-input currency-format">
    @error("product_classes.{$product->id}.price")
        <div class="error-message" style="color: red;">{{ $message }}</div>
    @enderror
</td>

<!-- Số lượng (stock_quantity) -->
<td>
    <input type="text" name="product_classes[{{ $product->id }}][stock_quantity]" 
           value="{{ number_format(old("product_classes.$product->id.stock_quantity", $product->stock_quantity), 0, '.', ',') }}" 
           class="editable-input currency-format">
    @error("product_classes.$product->id.stock_quantity")
        <div class="error-message" style="color: red;">{{ $message }}</div>
    @enderror
</td>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".currency-format").forEach(function (input) {
            input.addEventListener("input", function () {
                let value = this.value.replace(/,/g, "").replace(/\D/g, ""); // Xóa dấu phẩy cũ và ký tự không phải số
                if (value) {
                    this.value = new Intl.NumberFormat().format(value); // Thêm dấu phẩy mới
                }
            });
        });
    });
    </script>
    



                                        <!-- Nhận xét -->
                                        <td>
                                            <textarea name="product_classes[{{ $product->id }}][note]" class="editable-textarea">{{ old("product_classes.$product->id.note", $product->note) }}</textarea>
                                        </td>
                                        
                                        <!-- Xóa -->
                                        <td>
                                            <button type="button" class="deleted" onclick="deleteItem({{ $product->id }})">Xóa</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" style="color: red; text-align: center;">Không có dữ liệu</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="customer-actions">
                        <button type="submit" class="btn-update">Cập nhật</button>
                    </div>
                </form>

                <!-- Form xóa ẩn -->
                <form id="delete-form" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</section>

{{-- <!-- Thông báo -->
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<script>
    function deleteItem(id) {
        if (confirm('Bạn có chắc chắn muốn xóa?')) {
            const form = document.getElementById('delete-form');
            form.action = '/productclass/' + id;
            form.submit();
        }
    }
</script>

@endsection  
