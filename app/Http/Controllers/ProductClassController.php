<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductClass;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Product;
use App\Models\Maker;
class ProductClassController extends Controller
{
    // public function search(Request $request)
    // {
    //     $query = ProductClass::where('product_id', '31')->get();
    //     return $query;
    
    //     return view('productclass.edit_productclass', compact('query', 'productClasses', 'productClass', 'xxx'));
    // }
    public function search(Request $request)
    {
        // Lấy danh sách sản phẩm cho dropdown
        $xxx = ProductClass::select('id', 'product_code')->distinct()->get();
    
        // Nếu không có dữ liệu
        if ($xxx->isEmpty()) {
            return back()->withErrors(['message' => 'Không có dữ liệu sản phẩm!']);
        }
    
        // Khởi tạo query
        $query = ProductClass::query();
    
        // Nếu có product_id, lọc sản phẩm theo id
        if ($request->filled('product_id')) {
            $query->where('id', $request->product_id);
        }
    
        // Lấy danh sách sản phẩm
        $productClasses = $query->get();
    
        // Đảm bảo `$productClass` luôn tồn tại (tránh lỗi undefined variable)
        $productClass = $productClasses->first() ?? new ProductClass();
    
        return view('productclass.edit_productclass', compact('productClasses', 'xxx', 'productClass'));
    }
    
    
    public function edit($id)
    {
        try {
            $productClass = ProductClass::findOrFail($id);
    
            // Lấy tiền tố từ product_code
            $prefix = substr($productClass->product_code, 0, strpos($productClass->product_code, '-') + 1);
    
            // Lấy danh sách sản phẩm
            $xxx = ProductClass::select('id', 'product_code')->distinct()->get();
    
            // Lấy biến thể theo tiền tố
            $productClasses = ProductClass::where('product_code', 'like', $prefix . '%')
                ->orderBy('id')
                ->get();
    
            return view('productclass.edit_productclass', compact('productClass', 'productClasses', 'xxx'));
        } catch (\Exception $e) {
            Log::error('Lỗi khi lấy dữ liệu ProductClass: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Không tìm thấy dữ liệu!');
        }
    }
    


    
    

    
    
    

    
    

    



    public function destroy($id)
    {
        try {
            $productClass = ProductClass::findOrFail($id);
            $productId = $productClass->product_id;
            $productClass->delete();
    
            // Tìm biến thể còn lại để redirect tiếp tục chỉnh sửa nếu có
            $otherProductClass = ProductClass::where('product_id', $productId)->first();
    
            if ($otherProductClass) {
                return redirect()->route('productclass.edit', ['id' => $otherProductClass->id])
                                 ->with('success', 'Xóa thành công!');
            } else {
                return redirect()->route('productclass.index') // Nếu không còn biến thể nào
                                 ->with('success', 'Xóa thành công, không còn biến thể nào!');
            }
        } catch (\Exception $e) {
            Log::error('Lỗi xóa sản phẩm: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Xóa thất bại!');
        }
    }



    
// public function edit($id)
// {
//     try {
//         $productClass = ProductClass::findOrFail($id);

//         // Lấy tiền tố từ product_code
//         $prefix = substr($productClass->product_code, 0, strpos($productClass->product_code, '-') + 1);
//         $xxx = ProductClass::select('id')->distinct()->pluck('id');

//         // return $xxx;
//         // Lấy tất cả các biến thể có cùng tiền tố (bao gồm cả chính nó)
//         $productClasses = ProductClass::where('product_code', 'like', $prefix . '%')
//             ->orderBy('id')
//             ->get();

//         return view('productclass.edit_productclass', compact('productClass', 'productClasses', 'xxx'));
//     } catch (\Exception $e) {
//         Log::error('Lỗi khi lấy dữ liệu ProductClass: ' . $e->getMessage());
//         return redirect()->back()->with('error', 'Không tìm thấy dữ liệu!');
//     }
// }




// public function update(Request $request, $id)
// {
//     // dd($request->all());
//     DB::beginTransaction();

//     try {
//         $validatedData = $request->validate([
//             'product_classes'               => 'required|array|min:1',
//             'product_classes.*.id'          => 'required|exists:product_class,id',
//             'product_classes.*.cost'        => 'sometimes|required|numeric|min:0', 
//             'product_classes.*.price'       => 'sometimes|required|numeric|min:0', 
//             'product_classes.*.stock_quantity' => 'sometimes|required|numeric|min:0', 
//             'product_classes.*.note' => 'nullable|string|max:255',

//         ]);
        
//         foreach ($validatedData['product_classes'] as $data) {
//             $updateData = array_filter([
//                 'cost'           => $data['cost'] ?? null,
//                 'price'          => $data['price'] ?? null,
//                 'stock_quantity' => $data['stock_quantity'] ?? null, 
//                 'note'           => $data['note'] ?? null,
//                 'updated_at'     => now()
//             ], fn($value) => !is_null($value));

//             if (!empty($updateData)) {
//                 ProductClass::where('id', $data['id'])->update($updateData);
//             }
//         }

//         DB::commit();

//         //  Chuyển hướng về trang chỉnh sửa của sản phẩm sau khi cập nhật
//         return redirect()->route('productclass.edit', ['id' => $id])->with('success', 'Cập nhật thành công!');

//     } catch (ValidationException $e) {
//         DB::rollBack();
//         return redirect()->back()
//             ->withErrors($e->validator)
//             ->withInput()
//             ->with('error', 'Dữ liệu không hợp lệ, vui lòng kiểm tra lại!');
//     } catch (\Exception $e) {
//         DB::rollBack();

//         //  Ghi log chi tiết để debug
//         Log::error('Lỗi cập nhật ProductClass:', [
//             'message'      => $e->getMessage(),
//             'file'         => $e->getFile(),
//             'line'         => $e->getLine(),
//             'trace'        => $e->getTraceAsString(),
//             'request_data' => $request->all()
//         ]);

//         return redirect()->back()
//             ->withInput()
//             ->with('error', 'Lỗi hệ thống: ' . $e->getMessage() . ' - File: ' . $e->getFile() . ' - Dòng: ' . $e->getLine());
//     }
// }



public function update(Request $request, $id)
{
    DB::beginTransaction();

    try {
        // Xóa dấu phẩy trong dữ liệu trước khi validate
        $productClasses = $request->input('product_classes', []);
        foreach ($productClasses as $key => $data) {
            $productClasses[$key]['cost'] = isset($data['cost']) ? str_replace(',', '', $data['cost']) : null;
            $productClasses[$key]['price'] = isset($data['price']) ? str_replace(',', '', $data['price']) : null;
            $productClasses[$key]['stock_quantity'] = isset($data['stock_quantity']) ? str_replace(',', '', $data['stock_quantity']) : null;
        }
        $request->merge(['product_classes' => $productClasses]);

        // Validate dữ liệu
        $validatedData = $request->validate([
            'product_classes'               => 'required|array|min:1',
            'product_classes.*.id'          => 'required|exists:product_class,id', // Giữ nguyên đúng tên bảng
            'product_classes.*.cost'        => 'sometimes|required|numeric|min:0',
            'product_classes.*.price'       => 'sometimes|required|numeric|min:0',
            'product_classes.*.stock_quantity' => 'sometimes|required|numeric|min:0',
            'product_classes.*.note'        => 'nullable|string|max:255',
        ]);

        // Cập nhật dữ liệu
        foreach ($validatedData['product_classes'] as $data) {
            $updateData = array_filter([
                'cost'           => !empty($data['cost']) ? $data['cost'] : null,
                'price'          => !empty($data['price']) ? $data['price'] : null,
                'stock_quantity' => !empty($data['stock_quantity']) ? $data['stock_quantity'] : null,
                'note'           => !empty($data['note']) ? $data['note'] : null,
                'updated_at'     => now()
            ], fn($value) => $value !== null && $value !== '');

            if (!empty($updateData)) {
                ProductClass::where('id', $data['id'])->update($updateData);
            }
        }

        DB::commit();

        return redirect()->route('productclass.edit', ['id' => $id])->with('success', 'Cập nhật thành công!');

    } catch (ValidationException $e) {
        DB::rollBack();

        return redirect()->back()
            ->withErrors($e->validator)
            ->withInput()
            ->with('error', 'Dữ liệu không hợp lệ, vui lòng kiểm tra lại!');
    } catch (\Exception $e) {
        DB::rollBack();

        //  Ghi log chi tiết để debug
        Log::error('Lỗi cập nhật ProductClass:', [
            'message'      => $e->getMessage(),
            'file'         => $e->getFile(),
            'line'         => $e->getLine(),
            'trace'        => $e->getTraceAsString(),
            'request_data' => $request->all()
        ]);

        return redirect()->back()
            ->withInput()
            ->with('error', 'Lỗi hệ thống: ' . $e->getMessage() . ' - File: ' . $e->getFile() . ' - Dòng: ' . $e->getLine());
    }
}





}
