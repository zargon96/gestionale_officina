<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modello Auto
class Auto extends Model
{ 
    use HasFactory;
    protected $primaryKey = 'id'; 
    protected $table = 'auto';
    protected $fillable = ['modello', 'targa', 'n_telaio', 'marca', 'anno', 'chilometri'];

    // Relazione con la tabella Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');

    }
    // Relazione con la tabella Interventi
    public function interventi()
    {
        return $this->hasMany(Intervento::class);
    }
}
