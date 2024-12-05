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
    public function group()
    {
        return $this->belongsTo(Group::class,'id_group');
    }
    public function etat()
    {
        return $this->belongsTo(EtatDemande::class, 'id_etat_demande');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function etat_valid()
    {
        return $this->belongsTo(EtatValidMagasin::class, 'id_etat_valid_comptable');
    }
    public function user_comptable()
    {
        return $this->belongsTo(Employe::class, 'id_user_comptable');
    }
}
