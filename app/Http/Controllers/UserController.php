<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {   
        $users = User::all();
        if(count($users) == true){
            $data = [
                'message' => 'Get All User',
                'data' => $users
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Data is empty',
                'status' => 200
            ];
        // mengambalikan data json dan status codenya
        return response()->json($data, 200);
        }
    }

    public function store(Request $request)
    {
        $users = User::all();
        if ($users) {
            $data = [
                'message' => 'Data sudah ada',
                ];
            return response()->json($data, 200);
        }
           $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6',
                'address' => 'required|string',
           ]);
        $user = User::create($validatedData);
        $data = [
                'message' => 'Berhasil Membuat Data',
                'data' => $user,
            ];
            return response()->json($data, 201);
    }

    public function show($id)
    {
        $user = User::find($id);
        if($user){
            $data = [
                'message' => 'Get Detail Data',
                'data' => $user,
            ];
        return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Data Tidak Ditemukan',
                'status' => 404,
            ];
        return response()->json($data, 404);
        }
    }

    function update(Request $request, $id){
        $user = User::find($id);
    
        if($user){
        
        $input = [
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ?? $user->password,
            'address' => $request->address ?? $user->address,
        ];

        $user->update($input);
        $data = [
            'message' => 'Data berhasil diupdate',
            'data' => $user,
        ];
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => "Data Tidak Ditemukan",
                'status' => 404
            ];
            return response()->json($data, 404);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $data = [
                'message' => 'Data Berhasil dihapus',
                'Status' => 200,
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data Tidak Ditemukan',
                'Status' => 404,
            ];
            return response()->json($data, 404);
        }
    }
}
