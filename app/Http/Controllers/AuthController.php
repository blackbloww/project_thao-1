<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'username' => 'required|string|min:3',
            'password' => 'required|string|min:3',
            'email'    => 'required|email',
            'address'  => 'required',
            'phone'    => 'required|numeric',
        ]);
        
        // Kiểm tra username đã tồn tại chưa
        if (Customer::where('username', $request->username)->exists()) {
            return back()->withErrors(['username' => 'Tên đăng nhập đã tồn tại, vui lòng chọn tên khác.'])->withInput();
        }
    
        // Tạo mới đối tượng Customer
        $customer = new Customer();
        $customer->username = $request->username;
        $customer->password = bcrypt($request->password);  // Mã hóa mật khẩu
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->created_at = Carbon::now();
    
        // Lưu vào cơ sở dữ liệu
        $customer->save();
    
        // Chuyển hướng sau khi đăng ký thành công
        return redirect()->route('dk', ['id' => $customer->id])
                         ->with('success', 'Cảm ơn bạn đã đăng ký thành công tài khoản. Vui lòng đăng nhập để sử dụng dịch vụ.');
    }

    public function index_login()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3',
        ]);
    
        // Kiểm tra xem tài khoản có tồn tại không
        $userExists = Customer::where('username', $request->username)->exists();
    
        if ($userExists) {
            // Nếu tài khoản tồn tại, kiểm tra tiếp mật khẩu
            if (Auth::attempt($request->only('username', 'password'))) {
                $request->session()->regenerate();  
                // Chuyển hướng đến trang admin hoặc trang trước đó nếu đăng nhập thành công
                return redirect()->intended(route('admin'));
            } else {
                // Tài khoản đúng nhưng mật khẩu sai
                return back()->withErrors([
                    'login_error' => 'Mật khẩu không đúng.',
                ])->withInput($request->except('password'));
            }
        } else {
            // Tài khoản không tồn tại
            return back()->withErrors([
                'login_error' => 'Tài khoản không tồn tại.',
            ])->withInput($request->except('password'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();  // Đăng xuất người dùng
        $request->session()->invalidate();  // Xóa toàn bộ session
        $request->session()->regenerateToken();  // Tạo token mới để bảo vệ CSRF

        return redirect('/login')->with('success', 'Bạn đã đăng xuất thành công.');
    }

    public function showChangePasswordForm()
    {
        return view('auth.change_password'); // Trỏ đến giao diện đổi mật khẩu
    }


    // Xử lý đổi mật khẩu
    public function changePassword(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:3',
                'confirm_password' => 'required|same:new_password',
            // ], [
            //     'current_password.required' => 'Mật khẩu hiện tại không được bỏ trống.',
            //     'current_password.required' => 'Mật khẩu hiện tại sai',
            //     'new_password.required' => 'Mật khẩu mới không được bỏ trống.',
            //     'new_password.min' => 'Mật khẩu mới phải có ít nhất 3 ký tự.',
            //     'confirm_password.required' => 'Vui lòng xác nhận lại mật khẩu.',
            //     'confirm_password.same' => 'Mật khẩu xác nhận không trùng khớp.',
            ]);
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng!']);
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
}
