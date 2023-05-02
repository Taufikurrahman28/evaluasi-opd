<?php

namespace App\Models;

use App\Models\Periodik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluasi extends Model
{
    use HasFactory;
    protected $table = 'evaluasi';

    protected $fillable = [
        'nama_opd',
        'nama_web',
        'url_web',
        'tanggal_pemantauan',
        'keterangan',
        'periodik_id',
        'kategori_id',
        'catatan',
    ];
    public function periodik()
    {
        return $this->belongsTo(Periodik::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function details()
    {
        return $this->hasMany(DetailEvaluasi::class);
    }

    public function gambar()
    {
        return $this->hasMany(GambarEvaluasi::class);
    }



}
