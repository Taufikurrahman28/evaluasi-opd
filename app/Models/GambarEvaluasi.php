<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarEvaluasi extends Model
{
    use HasFactory;

    protected $table = 'gambar_evaluasi';

    protected $fillable = [
        'nama',
        'caption',
        'path',
        'evaluasi_id'
    ];

    public function evaluasi()
    {
        return $this->belongsTo(Evaluasi::class);
    }

}
