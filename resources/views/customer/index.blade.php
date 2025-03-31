@extends('layout.app')
@section('title', 'Danh sách khách hàng')

@section('content')

<section class="index">
<div class="container">
 <div class="content">
<div class="sec-two">
<h4>Danh sách khách hàng</h4>
<hr class="hr">
<form class="form-index" method="GET" action="{{ route('customer.index') }}">
    <div class="form-group">
        <label for="customer_id">Mã khách hàng</label>
        <input type="text" id="customer_id" name="customer_id" value="{{ request('customer_id') }}">
    </div>
    <div class="form-group">
        <label for="username">Tên khách hàng</label>
        <input type="text" id="username" name="username" value="{{ request('username') }}">
    </div>
    <div class="search">
        <button type="submit" class="btn-primery">Tìm kiếm</button>
    </div>
</form>
{{-- thông báo @if(session('success'))
    <p>{{ session('success') }}</p>
@endif --}}
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
                    <th style="width:120px">Mã khách hàng</th>
                    <th style="width:120px">Tên tài khoản</th>
                    <th style="width:150px">Email</th>
                    <th style="width:120px">Địa chỉ</th>
                    <th style="width:10px">Số điện thoại</th>
                    <th style="width:10px"></th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $index => $customer)
                <tr>
                    <td style="text-align: center;">
                        <a href="{{ route('customer.edit', $customer->id) }}">
                            {{ str_pad($customer->id, 8, '0', STR_PAD_LEFT) }}
                        </a>
                    </td>
                    <td>{{ $customer->username }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" style="display: flex; justify-content: center;">
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
        {{ $customers->links('vendor.pagination.default') }}
    </div>
    
</div>
 </div>
</div>
</section>
@endsection
