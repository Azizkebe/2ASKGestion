<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;

    protected $guarded = [];

        public function employe()
    {
        return $this->belongsTo(Employe::class, 'id_employe');
    }
    public function typemembre()
    {
        return $this->belongsTo(TypeMembre::class, 'id_type_membre');
    }
}
