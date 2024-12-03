<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheTechnique extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function etat_statut_demande_mission()
    {
        return $this->belongsTo(StatutDemandeMission::class, 'id_statut_demande_mission');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function user_sup()
    {
        return $this->belongsTo(User::class, 'id_sup_validateur');
    }
    public function typemission()
    {
        return $this->belongsTo(TypeMission::class, 'type_mission');
    }
    public function moyentransport()
    {
        return $this->belongsTo(MoyenTransport::class, 'moyen_transport');
    }
    public function user_validateur()
    {
        return $this->belongsTo(Employe::class, 'id_validateur');
    }
    public function voiture()
    {
        return $this->belongsTo(Voiture::class, 'id_vehicule');
    }
}
