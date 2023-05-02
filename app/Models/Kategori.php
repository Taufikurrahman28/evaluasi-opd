<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama',
        'status_tampil',
        'jenis_sumber',
        'periodik_id'
    ];

    public function periodik()
    {
        return $this->belongsTo(Periodik::class);
    }

    public function sub_kategori()
    {
        return $this->hasMany(SubKategori::class);
    }
}
