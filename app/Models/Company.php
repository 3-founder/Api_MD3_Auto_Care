<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';
    protected $fillable = [
        'logo',
        'nama_company',
        'no_hp',
        'email',
        'provinsi',
        'kota',
        'alamat',
    ];
}