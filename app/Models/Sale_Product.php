<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_Product extends Model
{
    use HasFactory;

    protected $table = 'sale_products';

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'id_sale');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($saleProduct) {
            // Elimina el producto asociado
            $saleProduct->product()->delete();
        });
    }
}

