<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon; 
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customerId = $request->input('customer_id'); // Lấy mã khách hàng từ request
        $username = $request->input('username'); // Lấy tên tài khoản từ request
    
        // Tìm kiếm theo ID (nếu có) và Username (nếu có)
        $customers = Customer::when($customerId, function ($query) use ($customerId) {
            return $query->where('id', $customerId); // Không dùng LIKE cho ID
        })->when($username, function ($query) use ($username) {
            return $query->where('username', 'LIKE', "%$username%"); 
        })->paginate(5); // Giữ phân trang
    
        // Truyền danh sách khách hàng và dữ liệu tìm kiếm qua view
        return view('customer.index', compact('customers', 'customerId', 'username'));
    }
    
    public function edit($id)
    {
        // Lấy thông tin khách hàng theo ID
        $customer = Customer::findOrFail($id);
        // Trả về view form chỉnh sửa, truyền dữ liệu của khách hàng
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'username' => 'required|string|min:3',
            'email'    => 'required|email',
            'address'  => 'required|string',
            'phone'    => 'required|numeric',
        ]);


        if (Customer::where('username', $request->username)->where('id', '!=', $id)->exists()) {
            return back()->withErrors(['username' => 'Tên đăng nhập đã tồn tại, vui lòng chọn tên khác.'])->withInput();
        }

        if (Customer::where('email', $request->email)->where('id', '!=', $id)->exists()) {
            return back()->withErrors(['email' => 'Email  đã tồn tại, vui lòng chọn email khác.'])->withInput();
        }


        $customer = Customer::findOrFail($id); 
        // Cập nhật thông tin khách hàng
        $customer->username = $request->username;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->updated_at = Carbon::now();
        
        // Lưu thay đổi vào cơ sở dữ liệu
        $customer->save();

        // Chuyển hướng về trang danh sách khách hàng với thông báo thành công
        return redirect()->route('customer.index')->with('success', 'Thông tin khách hàng đã được cập nhật.');
    }
    
    public function destroy($id)
    {
        // Lấy thông tin khách hàng theo ID
        $customer = Customer::findOrFail($id);
    
        // Xóa mềm khách hàng (đánh dấu là đã xóa, nhưng không xóa khỏi DB)
        $customer->delete();
    
        // Chuyển hướng về trang danh sách khách hàng với thông báo thành công
        return redirect()->route('customer.index')->with('success', 'Khách hàng đã được xóa thành công.');
    }

    
    
}




