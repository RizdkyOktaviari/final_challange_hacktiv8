<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['kategori_id','nama', 'Berat','image','harga','status'];
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
