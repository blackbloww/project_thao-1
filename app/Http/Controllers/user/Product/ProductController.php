<?php

namespace App\Http\Controllers\User\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['productClasses', 'productImages'])->get();
        return view('user.product.index', compact('products'));
    }

    public function getProduct(Request $request)
    {

    }
}


