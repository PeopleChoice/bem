<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];

    public function ficheTraitementAppelEntrant(){
        return $this->belongsTo(FicheTraitementAppelEntrant::class);
    }

   
    public function typeFormation(){
        return $this->hasMany(TypeFormation::class);
    }
}
