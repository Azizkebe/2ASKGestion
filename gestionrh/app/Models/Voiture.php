<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function type_vehicule()
    {
        return $this->belongsTo(TypeVehicule::class,'id_type_vehicule');
    }
}
