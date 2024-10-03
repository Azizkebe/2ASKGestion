<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $guarded = [];

public function year_table()
{
    return $this->hasMany(YearTable::class);
}
public function genre()
{
    return $this->belongsTo(Genre::class, 'id_genre');
}
public function matrimonial()
{
    return $this->belongsTo(Matrimonial::class, 'id_matrimonial');
}
public function domaine()
{
    return $this->belongsTo(Domaine::class,'id_domaine');
}
public function niveauetude()
{
    return $this->belongsTo(NiveauEtude::class, 'id_niveau_etude');
}
public function diplome()
{
    return $this->belongsTo(Diplome::class, 'id_diplome');
}
public function contrat()
{
    return $this->belongsTo(Contrat::class, 'id_contrat');
}
public function direction()
{
    return $this->belongsTo(Direction::class, 'id_direction');
}
public function service()
{
    return $this->belongsTo(Service::class, 'id_service');
}
public function antenne()
{
    return $this->belongsTo(Antenne::class, 'id_antenne');
}
public function bureau()
{
    return $this->belongsTo(Bureau::class, 'id_bureau');
}
public function poste()
{
    return $this->belongsTo(Poste::class, 'id_poste');
}
public function photo()
{
    return $this->belongsTo(CloudFilePhoto::class, 'id_cloud_file_photo');
}
public function photocontrat()
{
    return $this->belongsTo(CloudFileContrat::class, 'id_cloud_file_contrat');
}
public function photodiplome()
{
    return $this->belongsTo(CloudFileDiplome::class, 'id_cloud_file_diplome');
}
public function photoextrait()
{
    return $this->belongsTo(CloudFileExtrait::class, 'id_cloud_file_extrait');
}
public function photocv()
{
    return $this->belongsTo(CloudFileCv::class, 'id_cloud_file_cv');
}
}

