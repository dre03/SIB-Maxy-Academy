<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        // kita ambil data user lalu simpan pada variable $user
        $user = Auth::user();
        // kondisi jika user nya ada
        if($user){
            // jika user nya memiliki level bloger
            if($user->level =='bloger'){
                // arahkan ke halaman bloger ya :P
                return redirect()->intended('dashboard');
            }
            // jika user nya memiliki level user
            else if($user->level =='user'){
                // arahkan ke halaman user
                return redirect()->intended('blog');
            }
        }
            return view('auth.login');
    }
    
    public function proses_login(Request $request){
        // kita buat validasi pada saat tombol login di klik
        // validas nya username & password wajib di isi
        $request->validate([
                                'username'=>'required',
                                'password'=>'required'
                            ]);

    // ambil data request username & password saja
    $credential = $request->only('username','password');

        // cek jika data username dan password valid (sesuai) dengan data
        if(Auth::attempt($credential)){
            // kalau berhasil simpan data user ya di variabel $user
            $user = Auth::user();
            // cek lagi jika level user bloger maka arahkan ke halaman bloger
            if($user->level =='bloger'){
                return redirect()->intended('dashboard');
            }
            // tapi jika level user nya user biasa maka arahkan ke halaman user
            else if($user->level =='user'){
                return redirect()->intended('blog');
            }
        // jika belum ada role maka ke halaman /
        return redirect()->intended('/');
        }

        // jika ga ada data user yang valid maka kembalikan lagi ke halaman login
        // pastikan kirim pesan error juga kalau login gagal ya
        return redirect('login')->withInput()->withErrors(['login_gagal'=>'Username dan Password salah']);
    }

    public function register(){
        // tampilkan view register
        return view('auth.register');
    }


    // aksi form register
    public function proses_register(Request $request){
    //. kita buat validasi nih buat proses register
    // validasinya yaitu semua field wajib di isi
    // validasi username itu harus unique atau tidak boleh duplicate username ya
    $validator = Validator::make($request->all(),[
                    'name'=>'required',
                    'username'=>'required|unique:users',
                    'email'=>'required|email',
                    'password'=> 'required|min:8|confirmed',
                    'level' => 'required',
                ]);

        // kalau gagal kembali ke halaman register dengan munculkan pesan error
        if($validator ->fails()){
            return redirect('/register')->withErrors($validator)->withInput();
        }
        // kalau berhasil isi hash passwordnya ya biar secure
        $request['password'] = bcrypt($request->password);

        // masukkan semua data pada request ke table user
        User::create($request->all());

        // kalo berhasil arahkan ke halaman login
        return redirect()->route('login');
    }

    public function logout(Request $request){
        // logout itu harus menghapus session nya
        $request->session()->flush();
        // jalan kan juga fungsi logout pada auth
        Auth::logout();
        // kembali kan ke halaman login
        return Redirect('login');
    }
}
