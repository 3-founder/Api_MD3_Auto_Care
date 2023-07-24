<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPenawaran extends Model
{
    use HasFactory;

    protected $table = 'product_penawaran';
    protected $fillable = [
        'produk_item',
        'tipe_item',
        'kemasan',
        'tipe_kemasan',
        'mesin',
        'tipe_mesin',
        'harga',
        'id_penawaran',
    ];
}