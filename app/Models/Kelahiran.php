<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    use HasFactory;

    protected $table = 'kelahiran';

    protected $fillable = [
        'nama_bayi',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_ayah',
        'nama_ibu',
        'tempat_lahir',
        'berat_badan',
        'panjang_badan',
        'alamat',
        'no_akte',
        'orangtua_id'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'berat_badan' => 'decimal:2',
        'panjang_badan' => 'decimal:2',
    ];

    // Relasi ke OrangTua
    public function orangtua()
    {
        return $this->belongsTo(OrangTua::class, 'orangtua_id');
    }
}