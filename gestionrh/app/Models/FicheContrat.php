<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheContrat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contrat()
{
    return $this->belongsTo(Contrat::class, 'id_contrat');
}
public function employe()
{
    return $this->belongsTo(Employe::class, 'id_employe');
}

}
