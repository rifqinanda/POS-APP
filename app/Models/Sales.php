<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_produk',
        'total_item',
        'diskon',
    ];

    public function products() 
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }

    public function users() 
    {
        return $this->hasMany(User::class);
    }
}
