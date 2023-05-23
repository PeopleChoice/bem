<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotifAppel extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];
    

    public function objetAppel(){
        return $this->hasMany(ObjetAppel::class);
    }

    public function ficheTraitementAppelEntrant(){
        return $this->belongsTo(FicheTraitementAppelEntrant::class,'objet_appel_id');
    }
}
