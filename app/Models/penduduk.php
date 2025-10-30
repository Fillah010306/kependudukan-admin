<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penduduk extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nik',
        'first_name',
        'last_name', 
        'birthday',
        'gender',
        'phone',
    ];

    protected $casts = [
        'birthday' => 'date',
    ];

    protected $dates = ['deleted_at'];
}
