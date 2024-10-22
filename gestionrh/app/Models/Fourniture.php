<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fourniture extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function projet()
    {
        return $this->belongsTo(Projet::class, 'id_projet');
    }
    public function etat()
    {
        return $this->belongsTo(EtatDemande::class, 'id_etat_demande');
    }
}
