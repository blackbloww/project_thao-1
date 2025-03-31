@extends('layout.app')
@section('title', 'Danh sách sản phẩm')
@section('content')

<section class="index_product">
    <div class="container">
        <div class="content">
            <div class="sec-six">
                <h4>Danh sách sản phẩm</h4>
                <hr class="hr">
                <form class="product-form" method="GET" action="{{ route('product.index') }}">
                    <div class="form-field">
                        <label for="maker_name"> Nhà sản xuất</label>
                        <select name="maker_id" name="maker_id"  class="form-group__input form-group__input-maker_id1">
                            <option value="">Chọn nhà sản xuất</option>
                            @foreach($makers as $maker)
                                <option value="{{ $maker->id }}" {{ request('maker_id') == $maker->id ? 'selected' : '' }}>
                                    {{ $maker->maker_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-field">
                        <label for="product_name">Danh mục sản phẩm</label>
                        <select name="category_id" name="category_id"  class="form-group__input form-group__input-category_id1">
                            <option value="">Chọn danh mục</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-field">
                            <label for="product_code">Mã sản phẩm</label>
                            <input type="text" id="product_code" name="product_code" value="{{ request('product_code') }}">
                        </div>
    
                        <div class="form-field">
                            <label for="product_name">Tên sản phẩm</label>
                            <input type="text" id="product_name" name="product_name" value="{{ request('product_name') }}">
                        </div>
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="btn-primery">Tìm kiếm</button>
                        <button type="button" class="btn btn-danger">
                            <a href="{{ route('product.create') }}" style="color: white; text-decoration: none;">
                                Đăng ký nhà sản xuất
                            </a>
                        </button>
                        
                        
                    </div>
                </form>
                            {{-- thông báo @if(session('success'))
                            <p>{{ session('success') }}</p>
                        @endif --}} 
                {{-- thông báo --}}
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
                
                <hr class="hr">
                <div class="table-responsive">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th> Nhà sản xuất</th>
                                <th>Danh mục sản phẩm</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Ghi chú</th>
                                {{-- <th>Mã màu</th>
                                <th>Màu</th>
                                <th>Kích cỡ</th> --}}
                                <th>Hình ảnh sản phẩm</th>
                                <th style="width:10px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)  
                            <tr>
                                <!-- Mã sản phẩm -->
                                <td style="text-align: center;">
                                    <a href="{{ route('product.edit', $product->id) }}">
                                        {{ str_pad($product->id, 8, '0', STR_PAD_LEFT) }}
                                    </a>
                                </td>
                        
                                <!-- Mã nhà sản xuất -->
                                <td>
                                    {{ $product->maker->maker_name ?? 'Không có dữ liệu' }}
                                </td>
                        
                                <!-- Mã loại sản phẩm -->
                                <td>
                                    {{ $product->category->category_name ?? 'Không có dữ liệu' }}
                                </td>
                        
                                <!-- Lớp sản phẩm -->
                                <td>{{ $product->productClasses->first()->product_code ?? 'Không có dữ liệu' }}</td>
                        
                                <!-- Tên sản phẩm -->
                                <td>{{ $product->product_name }}</td>
                        
                                <!-- Ghi chú -->
                                <td>{{ $product->note }}</td>
                        
                                {{-- <!-- Mã màu -->
                                 <td>{{ $product->productClasses->first()->color_code ?? 'Không có dữ liệu' }}</td>
                        
                                <!-- Màu -->
                                <td>{{ $product->productClasses->first()->color ?? 'Không có dữ liệu' }}</td>
                        
                                <!-- Kích cỡ -->
                                <td>{{ $product->productClasses->first()->size ?? 'Không có dữ liệu' }}</td>
                                 --}}
                                <td>
                                    @if($product->productImages->isNotEmpty())
                                        @foreach($product->productImages as $image)
                                            <img src="{{ asset('storage/' . $image->product_image) }}" width="50" height="50" style="margin-right: 5px;">
                                        @endforeach
                                    @else
                                        Không có ảnh
                                    @endif
                                </td>
                                       
                                <td>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: flex; justify-content: center;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="deleted" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; color: red;">Không có dữ liệu</td>
                            </tr>
                            @endforelse
                        </tbody>
                        
                    </table>
                </div>
                
                 <div class="pagination-container">
                    {{ $products->links('vendor.pagination.default') }}
                </div> 
                
                
            </div>
        </div>
    </div>
</section>
@endsection
    