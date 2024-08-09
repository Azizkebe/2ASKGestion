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
    public function paramtypeconge()
    {
        return $this->belongsTo(ParamTypeConge::class,'id_param_type_conge','id');
    }
}
