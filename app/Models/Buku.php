<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    
    protected $table = 'bukus';
    protected $fillable = ['judul', 'kategori', 'sampul', 'penulis', 'penerbit', 'sinopsis', 'harga', 'stok'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'buku_id');
    }
}

