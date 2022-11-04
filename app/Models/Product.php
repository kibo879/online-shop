<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $tabel = 'products';

    protected $fillable = [
        'nama',
        'harga',
        'gambar',
        'deskripsi',
        'discount',
        'category_id'

    ];

      public function category()
      {
        return $this->belongsTo(Category::class);
      }
}
