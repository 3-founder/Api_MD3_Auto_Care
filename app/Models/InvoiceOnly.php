<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceOnly extends Model
{
    use HasFactory;

    protected $table = 'invoice_only';
    protected $fillable = [
        'no_invoice',
        'yth',
        'sales',
        'tanggal',
        'tanggal_jatuh_tempo',
        'po_no',
        'diskon',
        'ongkos_kirim',
        'cashback',
        'metode_pembayaran',
        'nama_bank',
        'no_rekening',
        'a_n_rekening',
        'id_user_signature',
    ];

    public function signatureUser(): BelongsTo
    {
        return $this->belongsTo(SignatureUser::class, 'id_user_signature', 'id');
    }
}