<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_Product extends Model
{
    protected $table = 'sale_products';
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'id_sale');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

}
