<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Models\AdoptForm;
use Auth;

class AdoptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adopt = AdoptForm::where('status_adopt', [0,1])->latest()->paginate(5);
        return view ('admin.adoptconfirm', ['adopt' => $adopt]);
    }

    public function list()
    {
        $id = Auth::user()->id;
        $adopt = AdoptForm::where('user_id', $id)->latest()->paginate(5);
        return view ('user.adoptionlist', ['adopt' => $adopt]);
    }
    public function confirmed()
    {
        $adopt = AdoptForm::where('status_adopt', 1)->latest()->paginate(5);
        return view ('admin.confirmed', ['adopt' => $adopt]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
            'alasan' => 'required',
        ]);

        AdoptForm::create([
            'namalengkap' => request('nama'),
            'usia' => request ('usia'),
            'alamat' => request('alamat'),
            'alasan' => request('alasan'),
            'user_id' => Auth::user()->id,
            'post_id' => request('post'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Form Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = AdoptForm::where('id', $id)->get();
        return view ('admin.form', ['posts' => $posts]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts =AdoptForm::findorFail($id);
        $posts->status_adopt = "1";
        $posts->save();
        return redirect()->back()->with('success', 'Form telah Dikonfirmasi');
    }

    public function tolak($id)
    {
        $posts =AdoptForm::findorFail($id);
        $posts->status_adopt = "2";
        $posts->save();
        return redirect()->back()->with('success', 'Form Ditolak');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
