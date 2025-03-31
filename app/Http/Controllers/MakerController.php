<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;
use Carbon\Carbon;

class MakerController extends Controller
{
    public function index(Request $request)
    {
        // Lấy mã nhà sản xuất từ request
        $makerId = $request->input('id'); 
        $maker_name = $request->input('maker_name'); 
    
        // Tìm kiếm theo ID hoặc tên nhà sản xuất
        $makers = Maker::when($makerId, function ($query) use ($makerId) {
            return $query->where('id', $makerId);
        })->when($maker_name, function ($query) use ($maker_name) {
            return $query->where('maker_name', 'LIKE', "%$maker_name%");
        })->paginate(5);
    
        return view('maker.index_maker', compact('makers', 'makerId', 'maker_name'));
    }

    public function destroy($id)
    {
        $maker = Maker::findOrFail($id);
        $maker->delete();
        return redirect()->route('maker.index')->with('success', 'Nhà sản xuất đã được xóa thành công.');
    }

    public function edit($id)
    {
        $maker = Maker::findOrFail($id);
        return view('maker.edit_maker', compact('maker'));
    }


    public function create()
    {
        return view('maker.create_maker');
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'maker_name' => 'required',
            'tel'        => 'required|numeric',
            'email'      => 'required|string|email',
            'note'       => 'nullable|string',
        ]);
    
        // Kiểm tra tên nhà sản xuất đã tồn tại chưa
        if (Maker::where('maker_name', $request->maker_name)->exists()) {
            return back()->withErrors(['maker_name' => 'Tên nhà sản xuất đã tồn tại, vui lòng chọn tên khác.'])->withInput();
        }
    
        // Kiểm tra email đã tồn tại chưa
        if (Maker::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'Email nhà sản xuất đã tồn tại, vui lòng chọn email khác.'])->withInput();
        }
    
        // Lưu nhà sản xuất mới
        $maker = new Maker();
        $maker->maker_name = $request->maker_name;
        $maker->email = $request->email;
        $maker->tel = $request->tel;
        $maker->note = $request->note;
        $maker->created_at = Carbon::now();
        $maker->save();
    
        return redirect()->route('maker.index')->with('success', 'Nhà sản xuất đã được đăng ký thành công.');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'maker_name' => 'required',
            'tel'        => 'required|numeric',
            'email'      => 'required|string|email',
            'note' => 'nullable|string',

        ]);
        if (Maker::where('maker_name', $request->maker_name)->where('id', '!=', $id)->exists()) {
            return back()->withErrors(['maker_name' => 'Tên nhà sản xuất đã tồn tại, vui lòng chọn tên khác.'])->withInput();
        }

        if (Maker::where('email', $request->email)->where('id', '!=', $id)->exists()) {
            return back()->withErrors(['email' => 'Email nhà sản xuất đã tồn tại, vui lòng chọn email khác.'])->withInput();
        }
    
        $maker = Maker::findOrFail($id);
        $maker->maker_name = $request->maker_name;
        $maker->email = $request->email;
        $maker->tel = $request->tel;
        $maker->note = $request->note;
        $maker->updated_at = Carbon::now();
        $maker->save();
        return redirect()->route('maker.index')->with('success', 'Thông tin nhà sản xuất đã được cập nhật.');
    }
    
}  



