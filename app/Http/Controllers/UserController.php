<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $blogs = Artikel::all();
        return view('index', compact('blogs'));
    }

    public function show(string $id)
    {
        //get blog by ID
        $blog = Artikel::findOrFail($id);
        //render view with blog
        return view('detail', compact('blog'));
    }
}
