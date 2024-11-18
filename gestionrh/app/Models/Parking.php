<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function etat_valid_vehicule()
    {
        return $this->belongsTo(EtatValidVehicule::class, 'id_statut_validateur');
    }
    public function voiture()
    {
        return $this->belongsTo(Voiture::class, 'id_vehicule');
    }
}
