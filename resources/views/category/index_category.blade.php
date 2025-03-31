@extends('layout.app')
@section('title', 'Danh sách  loại sản phẩm')
@section('content')

<section class="index_category">
    <div class="container">
        <div class="content">
            <div class="sec-four">
                <h4>Danh sách loại sản phẩm</h4>
                <hr class="hr">
                <form class="category-form" method="GET" action="{{ route('category.index') }}">
                    <div class="form-field">
                        <label for="id">Mã loại sản phẩm</label>
                        <input type="text" id="id" name="id" value="{{ request('id') }}">
                    </div>

                    <div class="form-field">
                        <label for="category_name">Tên loại sản phẩm</label>
                        <input type="text" id="category_name" name="category_name" value="{{ request('category_name') }}">
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="btn-primery">Tìm kiếm</button>
                        <button type="button" class="btn btn-danger">
                            <a href="{{ route('category.create') }}" style="color: white; text-decoration: none;">
                                Đăng ký nhà sản xuất
                            </a>
                        </button>
                        
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
                                <th style="width:150px">Mã loại</th>
                                <th style="width:150px" >Tên loại</th>
                                <th style="width:10px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categorys as $index => $category)  
                            <tr>
                                <td style="text-align: center;">
                                   <a href="{{ route('category.edit', $category->id) }}">
                                         {{ str_pad($category->id, 8, '0', STR_PAD_LEFT) }}
                                    </a>
                                </td>                                
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: flex; justify-content: center;">
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
                    {{ $categorys->links('vendor.pagination.default') }}
                </div>
                
                
            </div>
        </div>
    </div>
</section>
@endsection
    