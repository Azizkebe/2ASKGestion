<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antenne extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function direction()
    {
        return $this->belongsTo(Direction::class, 'id_direction');
    }
}
