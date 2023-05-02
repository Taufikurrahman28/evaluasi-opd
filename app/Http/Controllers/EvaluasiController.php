<?php

namespace App\Http\Controllers;

use App\Models\DetailEvaluasi;
use App\Models\Evaluasi;
use App\Models\GambarEvaluasi;
use App\Models\Kategori;
use App\Models\Periodik;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EvaluasiController extends Controller
{
    public function index()
    {
        $evaluasi = Evaluasi::get();

        return view('Evaluasi.index', ['evaluasi' => $evaluasi]);
    }

    public function create()
    {
        $kategori = Kategori::get();

        return view('Evaluasi.create', ['kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_opd' => 'required',
            'nama_web' => 'required',
            'url_web' => 'required',
            'tanggal_pemantauan' => 'required',
            'kategori_id' => 'required',
            'sub_kategori_id.*' => 'required',
            'ketersediaan.*' => 'required',
            'keterangan.*' => 'required',
            'catatan' => 'required',
            'gambar' => 'required',
            'gambar.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        Evaluasi::create([
            'nama_opd' => $validatedData['nama_opd'],
            'nama_web' => $validatedData['nama_web'],
            'url_web' => $validatedData['url_web'],
            'tanggal_pemantauan' => $validatedData['tanggal_pemantauan'],
            'kategori_id' => $validatedData['kategori_id'],
            'catatan' => $validatedData['catatan'],
            'periodik_id' => Periodik::where('is_aktif', 1)->first()->id,
        ]);

        $evaluasi = Evaluasi::latest()->first();

        for ($i = 0; $i < count($validatedData['sub_kategori_id']); $i++) {
            $data = [
                'evaluasi_id' => $evaluasi->id,
                'sub_kategori_id' => $validatedData['sub_kategori_id'][$i],
                'ketersediaan' => $validatedData['ketersediaan'][$i],
                'keterangan' => $validatedData['keterangan'][$i],
            ];
            DetailEvaluasi::create($data);
        }

        foreach ($request->file('gambar') as $file) {
            $path = $file->store('public/gambar-evaluasi');
            $nama_file = $file->getClientOriginalName();
            $path_public = 'storage/gambar-evaluasi/' . $file->hashName();
            $gambar = new GambarEvaluasi;
            $gambar->nama = $nama_file;
            $gambar->path = $path_public;
            $gambar->evaluasi_id = $evaluasi->id;
            $gambar->save();
        }

        return to_route('evaluasi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function getSubKategori($kategori_id)
    {
        $sub_kategori = SubKategori::where('kategori_id', $kategori_id)->get();

        return response()->json($sub_kategori);

    }

    public function printPDF($id)
    {
        $evaluasi = Evaluasi::findOrFail($id);
        $pdf = Pdf::loadView('Evaluasi.laporan', [
            'evaluasi' => $evaluasi
        ]);
        return $pdf->stream('Laporan Evaluasi.pdf');
    }
}
