<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('brand','texture', 'category', 'tags')->paginate(9);
        return response()->json([
            'success' => true,
            'results' => $products
        ]);
    }

    public function show($slug){
        $product = Product::with('brand','texture', 'category', 'tags')->where('slug', $slug)->first();
        if($product){
            return response()->json([
                'success' => true,
                'results' => $product
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Not Found'
            ]);
        }
    }
}
