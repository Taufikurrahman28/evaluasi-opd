<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Periodik;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index ()
    {
        $kategori = Kategori::get();

        return view('Kategori.index', ['kategori' => $kategori]);
    }

    public function create ()
    {
        return view ('Kategori.create');
    }

    public function store (Request $request)
    {
        $periodik_aktif = Periodik::where('is_aktif', 1)->first();
        $validatedData = $request->validate([
            'nama' => 'required|unique:kategori|',
            'status_tampil' => 'required',
            'jenis_sumber' => 'required',
        ] , [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah dipakai'
        ], [
            'nama' => "Nama",
            'status_tampil' => "Status tampil",
            'jenis_sumber' => "Jenis sumber",
        ]);
        $data = [
            'nama' => $validatedData['nama'],
            'status_tampil' => $validatedData['status_tampil'],
            'jenis_sumber' => $validatedData['jenis_sumber'],
            'periodik_id' => $periodik_aktif->id
        ];
        Kategori::create($data);
        return redirect()->route('kategori.index');
    }
    public function edit($id)
    {
        $kategori=Kategori::find($id);
        // dd($kategori)->all();
        return view ('Kategori.edit', ['kategori' => $kategori]);
    }

    public function update(Request $request,$id)
    {
        $kategori = Kategori::find($id);
        $validatedData = $request->validate([
            'nama' => 'required|unique:kategori,nama,' . $id,
            'status_tampil' => 'required',
            'jenis_sumber' => 'required',
        ] , [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah dipakai'
        ], [
            'nama' => "Nama",
            'status_tampil' => "Status tampil",
            'jenis_sumber' => "Jenis sumber",
        ]);
        $kategori->update($validatedData);
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori.index');
    }

}
