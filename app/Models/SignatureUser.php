<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignatureUser extends Model
{
    use HasFactory;

    protected $table = 'signature_users';

    protected $fillable = [
        'nama_lengkap',
        'tanda_tangan',
    ];
}