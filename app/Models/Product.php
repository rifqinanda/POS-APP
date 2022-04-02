<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_produk',
        'id_kategori',
        'merk',
        'harga_beli',
        'harga_jual',
        'diskon',
        'stok',
    ];

    public function categories() 
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }

    public function sales() 
    {
        return $this->hasMany(Sales::class);
    }


}
