<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandePermission extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function statut()
    {
        return $this->belongsTo(StatutPermission::class, 'id_statut_permission');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'id_chef_antenne','id');
    }
    public function statut_rh()
    {
        return $this->belongsTo(StatutPermissionRh::class, 'id_statut_permission_rh');
    }

}
