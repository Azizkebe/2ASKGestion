<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employe()
{
    return $this->belongsTo(Employe::class, 'id_employe');
}
    public function statutpermission()
    {
        return $this->belongsTo(StatutPermission::class,'id_statut_permission','id');
    }
    public function imagepermission()
    {
        return $this->belongsTo(CloudFilePermission::class,'id_cloud_file_permission');
    }
}
