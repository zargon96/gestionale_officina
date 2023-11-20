<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modello Auto
class Auto extends Model
{ 
    use HasFactory;
    protected $table = 'auto';
    protected $fillable = ['modello', 'targa', 'n_telaio', 'marca', 'anno', 'chilometri', 'note_stato', 'data_intervento'];

    // Relazione con la tabella Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
