<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeFormation extends Model
{
    use HasFactory;
    
    protected $fillable = ['libelle','ecole_id'];

    public function ecole(){
        return $this->belongsTo(Ecole::class);
    }
    


    public function diplome(){
        return $this->hasMany(Diplome::class);
    }

}
