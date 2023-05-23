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

class BackOfficeController extends Controller
{
    public function index(){
        $new_historique = self::getData();      
        return view('admin.backoffice.index',['historiques'=>$new_historique]);
    }
    public static function  getData(){
       
        $resolution = ResolutionApporter::where('libelle','like','Transféré')->first();
      
          
        $historiques = FicheTraitementAppelEntrant::where('resolution_apporter_id',(int)$resolution->id)->where('statut','n1')->get();
       

      
      
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


    public function show(Request $request){
        $historique = self::getData($request->id);

        $resolutions = ResolutionApporter::get();
        return view('admin.backoffice.show',['historique'=>$historique[0],'resolutions'=>$resolutions]);
    }


    public function update(Request $request,String $id){
       
        $old = FicheTraitementAppelEntrant::where('id',(int)$id)->first()->toArray();
        $old['statut']  =  "n2";
        FicheTraitementAppelEntrant::where('id',(int)$id)->update(['statut'=>'n2','resolution_apporter_id'=>(int)$request->resolution_apporter_id]);
        FicheTraitementAppelEntrant::create(Arr::except($old,['id']));
      
        
        return to_route('admin.backoffice.index')->with('success','La mise à jour de la résolution est effective !');
        
    }

}
