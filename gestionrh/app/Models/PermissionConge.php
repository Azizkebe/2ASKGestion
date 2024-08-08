<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionConge extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employe()
    {
        return $this->belongsTo(Employe::class,'id_employe','id');
    }
    public function conge()
    {
        return $this->belongsTo(Employe::class,'id_conge','id');
    }
}
