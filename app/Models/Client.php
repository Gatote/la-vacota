<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Client extends Model
{
    use HasFactory;
    use Searchable;
    
    public function sales()
    {
        return $this->hasMany(Sale::class, 'id_client', 'id');
    }

}
