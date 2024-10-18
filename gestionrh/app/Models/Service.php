<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function direction()
    {
        return $this->belongsTo(Direction::class, 'id_direction');
    }
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'id_chef_service');
    }
}
