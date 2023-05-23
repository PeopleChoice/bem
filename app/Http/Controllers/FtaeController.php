<?php

namespace App\Http\Controllers;

use App\Models\Diplome;
use App\Models\Ecole;
use App\Models\FicheTraitementAppelEntrant;
use App\Models\MotifAppel;
use App\Models\ObjetAppel;
use App\Models\Programme;
use App\Models\ResolutionApporter;
use App\Models\TypeFormation;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class FtaeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
  
 
  
        $ecoles = Ecole::get();
        $motifs = MotifAppel::get();
        $resolutions = ResolutionApporter::get();
        $historiques = self::getData($request->phone_number);
       
       
        
      

        $telephone = $request->phone_number;

        return view('public.form',['telephone'=>$telephone,'ecoles'=>$ecoles,'motifs'=>$motifs,'resolutions'=>$resolutions,'historiques'=>$historiques]);
       

    }


    public static function  getData($tel){
       
      
          
        $historiques = FicheTraitementAppelEntrant::where('tel',$tel)->get();
      

      
      
        $new_historique = array();
        foreach($historiques as $historique){
                if($historique->ecole_id){
                    $ecole = Ecole::find($historique->ecole_id);
                    if($ecole){
                        $historique->ecole_id = $ecole->libelle;
                    }else{
                        $historique->ecole_id = null;
                    }
                  
                }
                if($historique->type_formation_id){
                    $type_formation = TypeFormation::find($historique->type_formation_id);
                    if($type_formation){
                        $historique->type_formation_id = $type_formation->libelle;
                    }else{
                        $historique->type_formation_id = null;
                    }
                  
                }
                if($historique->diplome_id){
                    $diplome = Diplome::find($historique->diplome_id);
                    if($diplome){
                        $historique->diplome_id = $diplome->libelle;
                    }else{
                        $historique->diplome_id = null;
                    }
                  
                }


                if($historique->programme_id){
                    $programme = Programme::find($historique->programme_id);
                    if($programme){
                        $historique->programme_id = $programme->libelle;
                    }else{
                        $historique->programme_id = null;
                    }
                  
                }

                if($historique->motif_appel_id){
                    $motifAppel = MotifAppel::find($historique->motif_appel_id);
                    if($motifAppel){
                        $historique->motif_appel_id = $motifAppel->libelle;
                    }else{
                        $historique->motif_appel_id = null;
                    }
                  
                }

                if($historique->objet_appel_id){
                    $objetAppel = ObjetAppel::find($historique->objet_appel_id);
                    if($objetAppel){
                        $historique->objet_appel_id = $objetAppel->libelle;
                    }else{
                        $historique->objet_appel_id = null;
                    }
                  
                }
                if($historique->resolution_apporter_id){
                    $resolutions = ResolutionApporter::find($historique->resolution_apporter_id);
                    if($resolutions){
                        $historique->resolution_apporter_id = $resolutions->libelle;
                    }else{
                        $historique->resolution_apporter_id = null;
                    }
                  
                }

                array_push($new_historique,$historique);
             
        }

        return $new_historique;
        
                 
    }



    public function getFormation(Request $request){
        $typeformation = TypeFormation::where('ecole_id',$request->ecole_id)->get();
        $html = "<option value=''>Choisir un type de formation</option>";
        if(sizeof($typeformation) > 0)
        {
            foreach($typeformation as $item){
                $html = $html."<option value='$item->id'>".$item->libelle."</option>";
            }
        }
      
         return $html;
    }

    public function getDiplome(Request $request){
        $diplomes = Diplome::where('type_formation_id',$request->formation_id)->get();
        $html = "<option value=''>Choisir un Diplôme</option>";
        if(sizeof($diplomes) > 0)
        {
            foreach($diplomes as $item){
                $html = $html."<option value='$item->id'>".$item->libelle."</option>";
            }
        }
      
         return $html;
    }

    public function getProgramme(Request $request){
        $programmes = Programme::where('diplome_id',$request->diplome_id)->get();
        $html = "<option value=''>Choisir un Programme</option>";
        if(sizeof($programmes) > 0)
        {
            foreach($programmes as $item){
                $html = $html."<option value='$item->id'>".$item->libelle."</option>";
            }
        }
      
         return $html;
    }

    public function getObjet(Request $request){
        $objets = ObjetAppel::where('motif_appel_id',$request->motif_appel_id)->get();
        $html = "<option value=''>Choisir un Objet</option>";
        if(sizeof($objets) > 0)
        {
            foreach($objets as $item){
                $html = $html."<option value='$item->id'>".$item->libelle."</option>";
            }
        }
      
         return $html;
    }

    public function store(Request $request){
    
        FicheTraitementAppelEntrant::create(Arr::except($request->all(),['_method','_token']));


        // $ecoles = Ecole::get();
        // $motifs = MotifAppel::get();
        // $resolutions = ResolutionApporter::get();
        // $historiques = self::getData($request->phone_number);
       return to_route('formulaire_tae',['phone_number'=>$request->tel]);
       

    }




    

    

  


}
