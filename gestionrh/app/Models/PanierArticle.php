<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanierArticle extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function fourniture()
    {
        return $this->belongsTo(Fourniture::class, 'id_fourniture');
    }
    public function article()
    {
        return $this->belongsTo(Article::class, 'id_article');
    }
    public function StatutArticle()
    {
        return $this->belongsTo(StatutFourniture::class,'statut_article');
    }
}
