<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class SubkategoriController extends Controller
{
    public function index ()
    {
        $sub_kategori = SubKategori ::get();

        return view('Sub_kategori.index', ['sub_kategori' => $sub_kategori]);
    }
    public function create ()
    {
        $kategori = Kategori ::get();
        return view('Sub_kategori.create', ['kategori' => $kategori]  );
    }
    public function store (Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:sub_kategori',
            'status_tampil' => 'required',
            'kategori_id' => 'required'
        ] , [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah dipakai'
        ], [
            'nama' => "Nama",
            'status_tampil' => "Status tampil",
            'kategori_id' => "Kategori"
        ]);
        SubKategori::create($validatedData);
        return redirect()->route('sub_kategori.index');
    }

    public function edit($id)
    {
        $sub_kategori=SubKategori::find($id);
        $kategori=Kategori::all();
        return view ('Sub_kategori.edit',
        [
            'sub_kategori' => $sub_kategori,
            'kategori' => $kategori
    ]);
    }

    public function update(Request $request,$id)
    {
        $sub_kategori = SubKategori::find($id);
        $validatedData = $request->validate([
            'nama' => 'required|unique:kategori|',
            'status_tampil' => 'required',
            'kategori_id' => 'required'
        ] , [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah dipakai'
        ], [
            'nama' => "Nama",
            'status_tampil' => "Status tampil",
            'kategori_id' => "Kategori"
        ]);
        $sub_kategori->update($validatedData);
        return redirect()->route('sub_kategori.index');
    }

    public function destroy($id)
    {
        $sub_kategori = SubKategori::find($id);
        $sub_kategori->delete();
        return redirect()->route('sub_kategori.index');
    }

    public function show ($id)
    {

    }
}
