<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    protected $fillable = [
        'titulo',
        'imagen',
        'precio',
        'precio_tachado',
        'status',
        'destacar',
        'stock',
    ];

    public function products()
    {
        return $this->belongsToMany(Products::class, 'combo_products', 'combo_id', 'product_id');
    }
}
