<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervento extends Model
{
    use HasFactory;
    protected $fillable = [
        'note_stato',
        'data_intervento',
    ];

    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }
}
