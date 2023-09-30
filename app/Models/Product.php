<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_produk',
        'kategori_produk_id',
        'nama_produk',
        'harga_produk',
        'deskripsi_produk',
        'foto_produk',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_produk_id');
    }

    // Product.php
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
