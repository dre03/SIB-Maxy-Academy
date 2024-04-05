<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::all();
        if(count($orderDetails) > 0){
            $data = [
                'message' => 'Get All Order Details',
                'data' => $orderDetails
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
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $orderDetail = OrderDetail::create($validatedData);

        $data = [
            'message' => 'Successfully created order detail',
            'data' => $orderDetail,
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $orderDetail = OrderDetail::find($id);
        if($orderDetail){
            $data = [
                'message' => 'Get Detail Data',
                'data' => $orderDetail,
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
        $orderDetail = OrderDetail::find($id);

        if($orderDetail){
            $validatedData = $request->validate([
                'order_id' => 'exists:orders,id',
                'product_id' => 'exists:products,id',
                'quantity' => 'integer|min:1',
            ]);

        $orderDetail->update($validatedData);
        $data = [
            'message' => 'Successfully updated order detail',
            'data' => $orderDetail,
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
        $orderDetail = OrderDetail::find($id);
        if ($orderDetail) {
            $orderDetail->delete();
            $data = [
                'message' => 'Successfully deleted order detail',
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
