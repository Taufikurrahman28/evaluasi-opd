<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodik extends Model
{
    use HasFactory;
    protected $table = 'periodik';

    protected $fillable = ['nama', 'mulai', 'selesai', 'is_aktif'];

    protected $dates = ['mulai', 'selesai'];

    public function scopeAktif($query)
    {
        return $query->where('is_aktif', true);
    }
}
