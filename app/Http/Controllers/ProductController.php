<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static function index(){
        $products = Product::all();

        return view('pages.product', [
            'title' => 'Product',
            'products' => $products
        ]);
    }
}
