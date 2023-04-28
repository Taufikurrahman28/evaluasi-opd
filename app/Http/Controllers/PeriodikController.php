<?php

namespace App\Http\Controllers;

use App\Models\Periodik;
use Illuminate\Http\Request;

class PeriodikController extends Controller
{
    public function index()
    {
        $periodik = Periodik::get();

        return view('Periodik.index', ['periodik' => $periodik]);
    }
    public function create ()
    {
        return view ('Periodik.create');
    }
    public function store (Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|unique:periodik|',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai',
            'is_aktif' => 'required'
        ] , [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah dipakai',
            'date' => ':attribute harus berupa tanggal',
            'after' => ':attribute harus sesudah :date'
        ] , [
            'nama' => 'Nama',
            'mulai' => 'Mulai',
            'selesai' => 'Selesai',
        ]);
        Periodik::create($validateData);
        return redirect()->route('periodik.index');
    }
    public function edit($id)
    {
        $periodik=Periodik::find($id);
        // dd($periodik)->all();
        return view ('periodik.edit', ['data' => $periodik]);
    }

    public function update(Request $request,$id)
    {
        $periodik = Periodik::find($id);
        $validateData = $request->validate([
            'nama' => 'required|unique:periodik,nama,' . $id,
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai',
            'is_aktif' => 'required'
        ] , [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah dipakai',
            'date' => ':attribute harus berupa tanggal',
            'after' => ':attribute harus sesudah :date'
        ] , [
            'nama' => 'Nama',
            'mulai' => 'Mulai',
            'selesai' => 'Selesai',
        ]);
        $periodik->update($validateData);
        return redirect()->route('periodik.index');
    }
    public function destroy($id)
    {
        $periodik = Periodik::find($id);
        $periodik->delete();
        return redirect()->route('periodik.index');
    }
}
