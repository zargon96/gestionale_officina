<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    protected $fillable = ['nome', 'cognome', 'email','telefono','codice_fiscale'];

    public function auto()
    {
        return $this->hasMany(Auto::class);
    }

    // public function gruppoCliente()
    // {
    //     return $this->belongsTo(GruppoCliente::class, 'gruppo_cliente_id');
    // }
    
    
}



