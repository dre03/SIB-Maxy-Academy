<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        if(count($products) > 0){
            $data = [
                'message' => 'Get All Products',
                'data' => $products
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is empty',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

    $product = Product::create($validatedData);

    $data = [
        'message' => 'Successfully created product',
        'data' => $product,
    ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if($product){
            $data = [
                'message' => 'Get Detail Data',
                'data' => $product,
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data not found',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if($product){
            $validatedData = $request->validate([
            'name' => 'string',
            'description' => 'string',
            'price' => 'numeric',
            'stock' => 'integer',
        ]);

        $product->update($validatedData);

        $data = [
            'message' => 'Successfully updated product',
            'data' => $product,
        ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data not found',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
        $product->delete();
            $data = [
                'message' => 'Successfully deleted product',
                'Status' => 200,
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data not found',
                'Status' => 404,
            ];
            return response()->json($data, 404);
        }
    }
}


?>