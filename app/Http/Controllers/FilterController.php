<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
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
use Maatwebsite\Excel\Facades\Excel;

class FilterController extends Controller
{
    

    public function index(){
        $ecoles = Ecole::get();
        $motifs = MotifAppel::get();
        $new_historique = self::getData(null);      
        return view('admin.filtre.index',['historiques'=>$new_historique,'ecoles'=>$ecoles,'motifs'=>$motifs]);
    }


    public function show(Request $request){
        $historique = self::getData($request->id);

      
        return view('admin.filtre.show',['historique'=>$historique[0]]);
    }

    public function filtre(Request $request){
    
       
        $fiche = FicheTraitementAppelEntrant::query();
        if(is_null($request->tel) != true || $request->tel != '')
        {
            $fiche->where('tel',$request->tel);
        }
     
        if(is_null($request->ecole_id) != true || $request->ecole_id != '')
        {
           
            $fiche->where('ecole_id',(int)$request->ecole_id);
           
        }
        if(is_null($request->motif_appel_id) != true || $request->motif_appel_id != '')
        {
           
            $fiche->where('motif_appel_id',(int)$request->motif_appel_id);
            
        }
        if(is_null($request->objet_appel_id) != true || $request->motif_appel_id != '')
        { 
         
            $fiche->where('objet_appel_id',(int)$request->objet_appel_id);
           
        }
     
        if(is_null($request->type_formation_id) != true)
        {
            $fiche->where('type_formation_id',(int)$request->type_formation_id);
        }

       
        $fiche->whereBetween('created_at',[$request->date_debut.' 00:00:00',$request->date_fin.' 23:00:00']);
      
        
        $data = self::getData2($fiche->get());
        $data = self::getHtml($data);
   
        return $data;
    }

    public function imprime(Request $request){
              
      
        $fiche = FicheTraitementAppelEntrant::query();
        if(is_null($request->tel) != true || $request->tel != '')
        {
            $fiche->where('tel',$request->tel);
        }
        if(is_null($request->ecole_id) != true || $request->ecole_id != '')
        {
            $fiche->where('ecole_id',(int)$request->ecole_id);
           
        }
        if(is_null($request->motif_appel_id) != true || $request->motif_appel_id != '')
        {
           
            $fiche->where('motif_appel_id',(int)$request->motif_appel_id);
            
        }
        if(is_null($request->objet_appel_id) != true || $request->motif_appel_id != '')
        { 
         
            $fiche->where('objet_appel_id',(int)$request->objet_appel_id);
           
        }
     
        if(is_null($request->type_formation_id) != true)
        {
            $fiche->where('type_formation_id',(int)$request->type_formation_id);
        }

     

        $fiche->whereBetween('created_at',[$request->date_debut.' 00:00:00',$request->date_fin.' 23:00:00']);
      
        
        $data = self::getData2($fiche->get());

        
        return Excel::download(new ExportData($data), 'invoices.xlsx');
    }



    public static function  getData($id){
       
        if($id != null){
          
            $historiques = FicheTraitementAppelEntrant::where('id',(int)$id)->get();
        }else{
          
            $historiques = FicheTraitementAppelEntrant::get();
        }

      
      
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


    public static function  getData2($historiques){
       
    

      
      
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



    public static function getHtml($data){
        $html = "";
        foreach($data as $item)
        {
            $html = $html."<tr>";
          
            $html = $html."<td>".$item->created_at->format('d-m-Y')."</td>";
            $html = $html."<td>".$item->created_at->format('h:i')."</td>";
            $html = $html."<td>".$item->nom."</td>";
            $html = $html."<td>".$item->prenom."</td>";
            $html = $html."<td>".$item->tel."</td>";
            $html = $html."<td>".$item->ecole_id."</td>";
            $html = $html."<td>".$item->type_formation_id."</td>";
            $html = $html."<td>".$item->diplome_id."</td>";
            $html = $html."<td>".$item->programme_id."</td>";
            $html = $html."<td>".$item->motif_appel_id."</td>";
            $html = $html."<td>".$item->objet_appel_id."</td>";
            $html = $html."<td>".$item->resolution_apporter_id."</td>";
            $html = $html."<td>".$item->agent."</td>";
            $html = $html."<td>".$item->details."</td>";
            $html = $html."<td>";
            $html = $html."<a href='".route('admin.filtre.show',$item->id)."' class='btn btn-success'><i class='fa fa-eye'></i></a>";
               

            $html = $html."&nbsp;";
            if(Auth()->user()->profil == "Administrateur"){
                $html = $html."<a href='".route('admin.filtre.edit',$item)."' class='btn btn-primary'><i class='fa fa-edit'></i></a>";
            }
         
            $html = $html."</td>";
 
 
            $html = $html."</tr>";

        }  


        return $html;
       


    }

    public function edit(Request $request){
      

        $data =  FicheTraitementAppelEntrant::find((int)$request->id);
        
        $ecoles = Ecole::get();
        $motifs = MotifAppel::get();
        $resolutions = ResolutionApporter::get();

        return view('admin.filtre.edit',['historique'=>$data,'ecoles'=>$ecoles,'motifs'=>$motifs,'resolutions'=>$resolutions]);
 
     }


     public function update(Request $request){
      

        FicheTraitementAppelEntrant::where('id',$request->id)->update(Arr::except($request->all(),['_token','_method']));

        return to_route('admin.filtre')->with('success','FTAE modifiée !');
     }
 
     
}
