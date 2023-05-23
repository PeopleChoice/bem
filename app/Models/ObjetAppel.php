<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetAppel extends Model
{
    use HasFactory;

    
    protected $fillable = ['libelle','motif_appel_id'];
    

    public function motifAppel(){
        return $this->belongsTo(MotifAppel::class);
    }

}
