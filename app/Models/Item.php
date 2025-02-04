<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'harga', 'stok', 'kategori_id'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function itemDipesan()
    {
        return $this->belongsToMany(Pesanan::class)
            ->withPivot('kuantitas', 'harga');
    }
}
