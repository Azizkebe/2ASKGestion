<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyDiplome extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'id_employe');
    }
    public function typediplome()
    {
        return $this->belongsTo(MonDiplome::class, 'id_diplome');
    }
}
