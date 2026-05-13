<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    protected $fillable = ['nom', 'description', 'prix', 'categorie_id', 'image_path'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
