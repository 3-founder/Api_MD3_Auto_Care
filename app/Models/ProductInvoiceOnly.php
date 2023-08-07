<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInvoiceOnly extends Model
{
    use HasFactory;

    protected $table = 'product_invoice_only';
    protected $fillable = [
        'deskripsi_barang',
        'qty',
        'harga',
        'total',
        'id_invoice_only',
    ];
}