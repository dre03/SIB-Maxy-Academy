<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogerController extends Controller
{
  
    public function index(){
        $user = Auth::user()->id;
        $blogs = Artikel::where('user_id', $user)->get();
        return view('dashboard', compact('blogs'));
    }

     public function create()
     {
        return view('create-blog');
     }

     public function store(Request $request)
     {
        $user_id = Auth::user()->id;
        //validate form
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'description' => 'required|min:20'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/blogs', $image->hashName());

        //create blog
        Artikel::create([
            'title' => $request->title,
            'image' => $image->hashName(),
            'description' => $request->description,
            'user_id' => $user_id,
        ]);

        //redirect to index
        return redirect()->route('dashboard')->with(['success' => 'Blog Berhasil Dibuat!']);
     }

    public function edit($id)
    {
        // Temukan blog berdasarkan ID
        $blog = Artikel::find($id);
        // Jika blog tidak ditemukan, kembalikan ke halaman sebelumnya dengan pesan kesalahan
        if (!$blog) {
        return redirect()->back()->with(['error' => 'Blog tidak ditemukan']);
    }

    // Render view dengan data blog
    return view('edit-blog', compact('blog'));
    }


      public function update(Request $request, $id)
      {
        $user = Auth::user()->id;
        //validate form
        $this->validate($request, [
                    'title' => 'required',
                    'description' => 'required|min:20'
                ]);
        //get blog by ID
        $blog = Artikel::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

        //upload new image
        $image = $request->file('image');
        $image->storeAs('public/blogs', $image->hashName());

        //delete old image
        Storage::delete('public/blogs/'.$blog->image);

        //update blog with new image
        $blog->update([
                    'title' => $request->title,
                    'image' => $image->hashName(),
                    'description' => $request->description,
                    'user_id' => $user,
                ]);

        } else {
        //update blog without image
        $blog->update([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $user,
            ]);
        }

        //redirect to index
        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Diubah!']);
      }


    public function show(string $id)
    {
    //get blog by ID
    $blog = Artikel::findOrFail($id);
    //render view with blog
    return view('detail', compact('blog'));
    }

    public function destroy($id){
        $user = Auth::user()->id;
        $blog = Artikel::findOrFail($id);
        if ($blog->user_id != $user) {
            return redirect()->route('dashboard')->with(['error' => 'Anda tidak memiliki akses untuk menghapus blogini']);
        }
        Storage::delete(('public/blogs/'. $blog->image));
        $blog->delete();

        return redirect()->route('dashboard')->with(['success' => 'Blog Berhasil Dihapus']);
    }
}
