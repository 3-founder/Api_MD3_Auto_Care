<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penawaran extends Model
{
    use HasFactory;

    protected $table = 'penawaran';

    public function signatureUser(): BelongsTo
    {
        return $this->belongsTo(SignatureUser::class, 'id_user_signature', 'id');
    }
}