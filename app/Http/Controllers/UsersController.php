<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users = Customer::get();
        return response()->json($users);  // Trả về dữ liệu JSON
    }
    
    public function link()
    {
        return "Cảm ơn bạn đăng ký thành công";  // Trả về chuỗi đơn giản
    }
 

    
}
