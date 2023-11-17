<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GruppoCliente extends Model
{
    use HasFactory;
    
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'gruppo_cliente_id');
    }

}
