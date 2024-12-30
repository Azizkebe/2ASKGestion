<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class,'id_group');
    }
    public function projet()
    {
        return $this->belongsTo(Projet::class,'id_projet');
    }
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class,'id_fournisseur');
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class,'id_matiere');
    }
}
