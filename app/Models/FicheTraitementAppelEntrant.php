<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheTraitementAppelEntrant extends Model
{
    use HasFactory;
    
    protected $fillable = ['nom','prenom','tel','email','profil','details','agent',
                            'date_de_rappel','ecole_id','type_formation_id',
                            'diplome_id','programme_id','motif_appel_id','objet_appel_id',
                            'resolution_apporter_id',
                            'statut'
                         ];

    public function ecole(){
        return $this->hasMany(Ecole::class,'id');
    }

    public function typeFormation(){
        return $this->hasMany(TypeFormation::class,'id');
    }

    public function diplome(){
        return $this->hasMany(Diplome::class,'id');
    }

    public function programme(){
        return $this->hasMany(Programme::class,'id');
    }

    public function motifAppel(){
        return $this->hasMany(MotifAppel::class,'id');
    }
    public function objetAppel(){
        return $this->hasMany(ObjetAppel::class,'id');
    }
    public function resolutionApporter(){
        return $this->hasMany(ResolutionApporter::class,'id');
    }
}
