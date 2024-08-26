<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonDiplome extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'diplome_etude'];
}
