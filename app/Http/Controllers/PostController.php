<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\post;
use App\Models\kategori;
use App\Models\User;
use App\Models\comment;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
       $posts = Post::where('kategori_id', $id)->latest()->paginate(6);
        return view ('website.article', compact('posts'));
    }
    public function ed(Request $request, $id)
    {
       $posts = Post::where('kategori_id', $id)->latest()->paginate(6);
        return view ('website.education', compact('posts'));
    }
    public function adopsi()
    {
        $posts = Post::where('kategori_id', '2')->latest()->paginate(9);
        return view ('website.adopsi', ['posts' => $posts]);
    }
    public function cat($id)
    {
        $posts = Post::findorFail($id);
        return view ('website.cat', ['posts' => $posts]);
    }

    public function list()
    {
        $posts = post::select('id', 'judul', 'gambar', 'excerpt', 'slug', 'kategori_id', 'created_at')->latest()->paginate(5);
        return view ('crud.blog', ['posts' => $posts]);
    }
    public function kat(Request $request, $id)
    {
        $posts = Post::where('kategori_id', $id)->latest()->paginate(5);
        return view ('crud.kategori', ['posts' => $posts]);
    }

    public function frontpage()
    {
        $article = Post::where('kategori_id', '1')->offset(0)->limit(3)->get();
        $adopt = Post::where('kategori_id', '2')->offset(0)->limit(6)->get();
        $education = Post::where('kategori_id', '3')->offset(0)->limit(3)->latest()->get();
        return view('website.index', compact('article', 'adopt', 'education'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $kategoris = kategori::select('id', 'nama')->get();
        return view ('crud.tambahpost', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'judul' => 'required',
            'content' => 'required',
            'excerpt' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images'), $imageName);

        Post::create([
            'judul' => request('judul'),
            'gambar'=>$imageName,
            'content' => request ('content'),
            'excerpt' => request('excerpt'),
            'slug' => Str::slug(request('judul'), '-'),
            'user_id' => Auth::user()->id,
            'kategori_id' => request('kategori'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        return redirect('/allpost')->with('success', 'Postingan berhasil ditambahkan!');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Post::where('kategori_id', '1')->latest()->get();
        $adopt = Post::where('kategori_id', '2')->latest()->get();
        $education = Post::where('kategori_id', '3')->latest()->get();
        $posts = Post::findorFail($id);
        return view('website.singlepost', compact('article', 'adopt', 'education', 'posts'));
    }

	public function cari(Request $request)
	{
		$cari = $request->cari;
 
		$hasil = Post::where('judul', 'like', "%".$cari."%")->latest()->paginate(6);
 		return view('website.hasilcari',['hasil' => $hasil]);
 
	}

    public function cariAdmin(Request $request)
	{
		$cari = $request->cari;
 
		$hasil = Post::where('judul', 'like', "%".$cari."%")->latest()->paginate(5);
 		return view('crud.cari',['hasil' => $hasil]);
 
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoris = kategori::select('id', 'nama')->get();
        $posts = Post::findorFail($id);
        return view('crud.updatepost', compact('kategoris', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts = Post::find($id);
        $posts->judul = $request->judul;
        if ($request->hasFile('gambar')){
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images'), $imageName);
          } else {
            $imageName = $posts->gambar;
          }
        $posts->gambar = $imageName;
        $posts->content = $request->content;
        $posts->excerpt = $request->excerpt;
        $posts->slug = Str::slug($request->judul, '-');
        $posts->kategori_id = $request->kategori;
        $posts->updated_at = date('Y-m-d H:i:s');
        $posts->save();

        return redirect('/allpost')->with('success', 'Postingan berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::findorFail($id);
        $posts->delete();

        return back();


    }
}
