<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    protected $table = 'orang_tua';

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'agama',
        'pekerjaan',
        'pendidikan',
        'no_telepon',
        'status'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date'
    ];

    // Relasi ke Kelahiran
    public function kelahiran()
    {
        return $this->hasMany(Kelahiran::class, 'orangtua_id');
    }
}