<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    // Field yang dapat diisi massal
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // Jika tidak menggunakan timestamps, bisa dinonaktifkan
    public $timestamps = true;

    /**
     * Relasi ke user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke produk
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
