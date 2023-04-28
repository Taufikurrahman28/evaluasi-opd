<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    public function index()
    {
        $evaluasi = Evaluasi::get();

        return view('Evaluasi.index', ['evaluasi' => $evaluasi]);
    }
    public function create ()
    {
        return view ('Evaluasi.create');
    }
    public function store ()
    {
        
    }
}
