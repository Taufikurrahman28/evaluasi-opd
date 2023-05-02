<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailEvaluasi extends Model
{
    use HasFactory;

    protected $table = 'detail_evaluasi';

    protected $fillable = [
        'sub_kategori_id',
        'ketersediaan',
        'keterangan',
        'evaluasi_id'
    ];

    public function sub_kategori()
    {
        return $this->belongsTo(SubKategori::class);
    }

    public function evaluasi()
    {
        return $this->belongsTo(Evaluasi::class);
    }


}
