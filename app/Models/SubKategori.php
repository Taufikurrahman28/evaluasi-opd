<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    use HasFactory;

    protected $table = 'sub_kategori';

    protected $fillable = [
        'nama',
        'kategori_id',
        'status_tampil'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
