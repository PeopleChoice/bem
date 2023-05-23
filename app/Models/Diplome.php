<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    use HasFactory;

    protected $fillable = ['libelle','type_formation_id'];



    public function typeFormation(){
        return $this->belongsTo(TypeFormation::class);
    }
    

    public function programme(){
        return $this->hasMany(Programme::class);
    }
}
