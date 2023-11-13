<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_products', 'id_sale', 'id_product');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
    public function saleProducts()
    {
        return $this->hasMany(Sale_Product::class, 'id_sale');
    }
}
