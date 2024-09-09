<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamTypeConge extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function yeartable()
    {
        return $this->belongsTo(YearTable::class, 'id_yeartable');
    }
}
