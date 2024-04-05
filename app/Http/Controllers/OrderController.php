<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        if(count($orders) > 0){
            $data = [
                'message' => 'Get All Orders',
                'data' => $orders
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
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
        ]);

        $order = Order::create($validatedData);

        $data = [
            'message' => 'Successfully created order',
            'data' => $order,
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $order = Order::find($id);
        if($order){
            $data = [
                'message' => 'Get Detail Data',
                'data' => $order,
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
        $order = Order::find($id);
        if($order){
        $validatedData = $request->validate([
            'user_id' => 'exists:users,id',
            'date' => 'date',
        ]);

        $order->update($validatedData);

        $data = [
            'message' => 'Successfully updated order',
            'data' => $order,
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
        $order = Order::find($id);
        if ($order) {
        $order->delete();
        $data = [
            'message' => 'Successfully deleted order',
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

